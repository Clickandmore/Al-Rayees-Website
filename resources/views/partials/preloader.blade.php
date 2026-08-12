{{-- Brief brand-mark splash; removed from the DOM once the page loads. --}}

<div class="preloader" data-preloader role="status" aria-live="polite">
    <span class="sr-only">{{ config('site.company.name') }}</span>

    <div class="preloader__mark" aria-hidden="true">
        <svg viewBox="0 0 48 48">
            <path
                pathLength="1"
                d="M24 7 41 24 24 41 7 24 24 7Z"
                stroke="var(--gold)" stroke-width="1.6" fill="none" stroke-linejoin="round"
            />
            <path
                pathLength="1"
                d="M24 15.5 32.5 24 24 32.5 15.5 24 24 15.5Z"
                stroke="var(--gold-2)" stroke-width="1.4" fill="none" stroke-linejoin="round"
            />
            <circle
                pathLength="1"
                cx="24" cy="24" r="21"
                stroke="var(--gold)" stroke-opacity=".3" stroke-width="1" fill="none"
            />
        </svg>
    </div>

    <div class="preloader__bar"><i></i></div>
</div>
