@props(['items' => [], 'columns' => 1])

{{-- Ticked list: shipment documents, partnership benefits, services, specs. --}}

<ul {{ $attributes->class(['checklist', "checklist--cols-{$columns}" => $columns > 1]) }}>
    @foreach ($items as $item)
        <li class="checklist__item">
            <x-icon name="check" class="checklist__mark" />
            <span>{{ $item }}</span>
        </li>
    @endforeach
</ul>
