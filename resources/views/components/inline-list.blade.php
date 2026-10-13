@props(['items' => [], 'label' => null])

{{-- A short run of names (countries, markets) set as text, separated by thin rules. --}}

<ul {{ $attributes->class('inline-list') }} @if ($label) aria-label="{{ $label }}" @endif>
    @foreach ($items as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
