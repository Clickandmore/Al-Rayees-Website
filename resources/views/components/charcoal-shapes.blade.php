{{--
    Briquette shapes and sizes (config/charcoal.php), shared by the Jordan
    and Syria profiles. Colours follow the page theme via .shapes--*.
--}}

<div {{ $attributes->class('shapes') }}>
    @foreach (config('charcoal.shapes') as $i => $shape)
        <article class="shape" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <figure class="shape__media">
                <img src="{{ asset($shape['image']) }}" alt="{{ $shape['name'] }}" width="420" height="300" loading="lazy">
            </figure>

            <h3 class="shape__name ltr">{{ $shape['name'] }}</h3>

            <table class="shape__table">
                <tbody>
                    @foreach ($shape['sizes'] as [$size, $pieces])
                        <tr>
                            <th scope="row" class="ltr">{{ $size }}</th>
                            <td><span class="ltr">{{ $pieces }}</span> {{ __('site.common.per_kg') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </article>
    @endforeach
</div>
