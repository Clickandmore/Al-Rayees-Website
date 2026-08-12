@props(['items' => []])

{{-- Ticked list used for shipment documents and partnership benefits. --}}

<ul class="checklist" {{ $attributes }} data-reveal-group>
    @foreach ($items as $item)
        <li class="checklist__item" data-reveal="left">
            <span class="checklist__mark" aria-hidden="true"><x-icon name="check" /></span>
            <span>{{ $item }}</span>
        </li>
    @endforeach
</ul>
