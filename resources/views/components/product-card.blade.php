@props(['product'])

{{-- Charcoal product card with its spec chips. --}}

<article
    @class([
        'card',
        'product-card',
        'product-card--featured' => $product['featured'] ?? false,
    ])
    data-reveal
>
    <span class="product-card__num num" aria-hidden="true">{{ $product['index'] }}</span>

    <h4 class="card__title">{{ $product['title'] }}</h4>
    <p class="card__text">{{ $product['text'] }}</p>

    <div class="product-card__specs">
        @foreach ($product['specs'] as $spec)
            <span class="spec">
                <x-icon name="check" />
                {{ $spec }}
            </span>
        @endforeach
    </div>
</article>
