@php
    $givingUrl = 'https://newlifebible.churchcenter.com/giving/to/general';
@endphp

<header class="sticky top-0 z-50 border-b border-neutral-tan/50 bg-surface-light/95 backdrop-blur-sm">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3 md:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-2">
            <img
                src="/images/logos/NLBC_LogoPrimary_color.png"
                alt="New Life Bible Church"
                class="h-10 w-auto md:h-12"
            />
        </a>

        <nav class="hidden items-center gap-1 lg:flex">
            <a href="{{ route('home') }}" class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40">Home</a>
            <a href="{{ route('start-here') }}" class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40">Start Here</a>
            <a href="{{ route('who-we-are') }}" class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40">Who We Are</a>
            <div class="relative inline-block text-left">
                <details class="group">
                    <summary
                        class="inline-flex cursor-pointer list-none items-center gap-1 rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary marker:hidden hover:bg-neutral-tan/40 [&::-webkit-details-marker]:hidden"
                    >
                        Ministries
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </summary>
                    <div
                        class="absolute left-0 z-20 mt-1 w-56 origin-top-left border border-neutral-tan/60 bg-white py-1 shadow-lg"
                    >
                        <a href="{{ route('ministries') }}" class="block px-4 py-2 text-sm text-primary hover:bg-surface-cream">Overview</a>
                        <a href="{{ route('ministries.kids') }}" class="block px-4 py-2 text-sm text-primary hover:bg-surface-cream">Kids Ministry</a>
                        <a href="{{ route('ministries.youth') }}" class="block px-4 py-2 text-sm text-primary hover:bg-surface-cream">Youth Ministry</a>
                        <a href="{{ route('ministries.adults') }}" class="block px-4 py-2 text-sm text-primary hover:bg-surface-cream">Adult Groups</a>
                    </div>
                </details>
            </div>
            <a href="{{ route('media') }}" class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40">Media</a>
            <a href="{{ route('connect') }}" class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40">Connect</a>
            <a
                href="{{ $givingUrl }}"
                target="_blank"
                rel="noopener noreferrer"
                class="rounded-sm px-3 py-2 text-xs font-semibold uppercase tracking-wide text-primary hover:bg-neutral-tan/40"
            >Give</a>
        </nav>

        <details class="relative lg:hidden">
            <summary
                class="inline-flex cursor-pointer list-none items-center rounded-sm p-2 text-primary marker:hidden [&::-webkit-details-marker]:hidden"
                aria-label="Open menu"
            >
                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </summary>
            <div class="absolute right-0 z-30 mt-2 w-64 border border-neutral-tan/60 bg-white py-2 shadow-lg">
                <nav class="flex flex-col gap-1 px-2">
                    <a href="{{ route('home') }}" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Home</a>
                    <a href="{{ route('start-here') }}" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Start Here</a>
                    <a href="{{ route('who-we-are') }}" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Who We Are</a>
                    <a href="{{ route('ministries') }}" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Ministries</a>
                    <a href="{{ route('ministries.kids') }}" class="rounded-sm px-3 py-2 pl-6 text-sm text-primary">Kids Ministry</a>
                    <a href="{{ route('ministries.youth') }}" class="rounded-sm px-3 py-2 pl-6 text-sm text-primary">Youth Ministry</a>
                    <a href="{{ route('ministries.adults') }}" class="rounded-sm px-3 py-2 pl-6 text-sm text-primary">Adult Groups</a>
                    <a href="{{ route('media') }}" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Media</a>
                    <a href="{{ route('connect') }}" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Connect</a>
                    <a href="{{ $givingUrl }}" target="_blank" rel="noopener noreferrer" class="rounded-sm px-3 py-2 text-sm font-semibold uppercase text-primary">Give</a>
                </nav>
            </div>
        </details>
    </div>
</header>
