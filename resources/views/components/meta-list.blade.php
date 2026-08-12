@props(['items' => []])

{{-- Label / value rows.

     A value may hold several entries separated by "·" (three phone numbers,
     two WhatsApp lines …). Each one is split onto its own row so the digits
     stack into a clean column instead of wrapping mid-run, and each is turned
     into a real tel: / mailto: / wa.me link. Values are bidi-isolated so Latin
     numbers read correctly inside Arabic (RTL) copy. --}}

@php
    // Guesses what a value is from its own shape. An item may override with
    // 'type' => 'tel' | 'mail' | 'web' | 'chat' | 'place'.
    $classify = function (string $value): string {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'mail';
        }

        if (preg_match('#^(https?://|www\.)#i', $value) || preg_match('/^[\w-]+(\.[\w-]+)+$/', $value)) {
            return 'web';
        }

        if (preg_match('/^\+?[\d(][\d\s\-().]{5,}$/', $value)) {
            return 'tel';
        }

        return 'place';
    };

    $icons = [
        'tel' => 'phone',
        'chat' => 'chat',
        'mail' => 'mail',
        'web' => 'web',
        'social' => 'social',
        'place' => 'pin',
    ];

    // Bare digits in E.164 shape, for tel: / wa.me hrefs.
    $digits = function (string $value): string {
        $d = preg_replace('/\D/', '', $value);

        return str_starts_with($d, '00') ? substr($d, 2) : $d;
    };
@endphp

<dl class="meta-list" {{ $attributes }}>
    @foreach ($items as $item)
        @php
            $values = array_values(array_filter(array_map('trim', preg_split('/\s*·\s*/u', $item['value']))));
        @endphp

        <div class="meta-row">
            <dt class="meta-row__label">
                <x-icon name="{{ $icons[$item['type'] ?? $classify($values[0] ?? '')] ?? 'pin' }}" class="meta-row__icon" />
                <span>{{ $item['label'] }}</span>
            </dt>

            <dd class="meta-row__values">
                @foreach ($values as $value)
                    @php
                        $type = $item['type'] ?? $classify($value);

                        // An explicit href wins, but only when the row holds a
                        // single value — one link cannot stand for three numbers.
                        $href = count($values) === 1 ? ($item['href'] ?? null) : null;

                        $href ??= match ($type) {
                            'tel' => 'tel:+' . $digits($value),
                            'chat' => 'https://wa.me/' . $digits($value),
                            'mail' => 'mailto:' . $value,
                            'web' => str_starts_with($value, 'http') ? $value : 'https://' . $value,
                            default => null,
                        };

                        $classes = 'meta-value' . (in_array($type, ['tel', 'chat'], true) ? ' meta-value--num' : '');
                    @endphp

                    @if ($href)
                        <a
                            class="{{ $classes }}"
                            href="{{ $href }}"
                            @if ($type === 'chat' || $type === 'web') target="_blank" rel="noopener noreferrer" @endif
                        >
                            <span class="ltr">{{ $value }}</span>
                        </a>
                    @else
                        <span class="{{ $classes }} meta-value--static">
                            <span class="ltr">{{ $value }}</span>
                        </span>
                    @endif
                @endforeach
            </dd>
        </div>
    @endforeach
</dl>
