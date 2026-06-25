<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Positivus is a digital marketing agency that helps businesses grow and succeed online through SEO, PPC, social media marketing, and content creation.">
    <meta property="og:title" content="Positivus - Digital Marketing Agency">
    <meta property="og:description" content="Navigate the digital landscape for success with marketing campaigns built for measurable growth.">
    <meta property="og:type" content="website">
    <title>Positivus - Digital Marketing Agency</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-lg focus:bg-positivus-green focus:px-4 focus:py-3 focus:text-positivus-dark">Skip to content</a>

    <header class="container-page py-8 lg:py-14" data-mobile-nav>
        <nav class="flex items-center justify-between gap-8" aria-label="Primary navigation">
            <a href="{{ route('landing') }}" class="group flex items-center gap-3" aria-label="Positivus home">
                <span class="grid size-9 place-items-center rounded-full bg-positivus-dark text-positivus-green transition-transform group-hover:rotate-12">
                    <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 1.75 14.42 8l6.7-1.1-4.35 5.2 4.35 5.2-6.7-1.1L12 22.25 9.58 16.2l-6.7 1.1 4.35-5.2-4.35-5.2L9.58 8 12 1.75Z" />
                    </svg>
                </span>
                <span class="text-3xl font-semibold tracking-tight">Positivus</span>
            </a>

            <button type="button" class="grid size-11 place-items-center rounded-lg border border-positivus-dark lg:hidden" data-mobile-nav-toggle aria-expanded="false" aria-controls="mobile-menu">
                <span class="sr-only">Toggle menu</span>
                <svg data-mobile-nav-open-icon class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                <svg data-mobile-nav-close-icon class="hidden size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg>
            </button>

            <div class="hidden items-center gap-8 lg:flex">
                @foreach ($navItems as $item)
                    <a class="text-lg transition-colors hover:text-black/60" href="#{{ \Illuminate\Support\Str::slug($item) }}">{{ $item }}</a>
                @endforeach
                <a class="button-outline" href="#contact">Request a quote</a>
            </div>
        </nav>

        <div id="mobile-menu" data-mobile-nav-menu hidden class="mt-6 rounded-3xl border border-positivus-dark bg-white p-5 shadow-[0_5px_0_#191a23] lg:hidden">
            <div class="grid gap-2">
                @foreach ($navItems as $item)
                    <a class="rounded-xl px-4 py-3 text-lg hover:bg-positivus-gray" href="#{{ \Illuminate\Support\Str::slug($item) }}" data-mobile-nav-link>{{ $item }}</a>
                @endforeach
                <a class="button-dark mt-2 w-full" href="#contact" data-mobile-nav-link>Request a quote</a>
            </div>
        </div>
    </header>

    <main id="main-content">
        {{-- Hero --}}
        <section class="container-page grid items-center gap-12 pb-16 pt-2 lg:grid-cols-[minmax(0,0.95fr)_minmax(420px,1fr)] lg:pb-20">
            <div class="max-w-[560px]">
                <h1 class="text-balance text-[clamp(2.7rem,6vw,4.6rem)] font-medium leading-[1.05] tracking-normal">Navigating the digital landscape for success</h1>
                <p class="mt-8 max-w-[510px] text-xl leading-8">Our digital marketing agency helps businesses grow and succeed online through a range of services including SEO, PPC, social media marketing, and content creation.</p>
                <a class="button-dark mt-9 w-full sm:w-auto" href="#contact">Book a consultation</a>
            </div>

            <img class="mx-auto w-full max-w-[600px]" src="{{ asset('images/positivus/hero-illustration.svg') }}" alt="Digital marketing strategy illustration">
        </section>

        {{-- Partners --}}
        <section class="container-page pb-20" aria-label="Trusted by">
            <div class="logo-marquee overflow-hidden opacity-50 grayscale" aria-label="Companies that trust Positivus">
                <div class="logo-marquee-track flex w-max items-center gap-14">
                    @foreach (range(1, 2) as $set)
                        <div class="flex items-center gap-14" @if ($set === 2) aria-hidden="true" @endif>
                            @foreach ($partners as $partner)
                                <span class="logo-wordmark shrink-0 text-center text-2xl font-semibold tracking-tight">{{ $partner }}</span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Services --}}
        <section id="services" class="container-page py-10">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <h2 class="section-kicker">Services</h2>
                <p class="max-w-[580px] text-lg leading-7">At our digital marketing agency, we offer a range of services to help businesses grow and succeed online. These services include:</p>
            </div>

            <div class="mt-20 grid gap-10 lg:grid-cols-2">
                @foreach ($services as $index => $service)
                    @php
                        $isDark = $service['tone'] === 'dark';
                        $cardClass = match ($service['tone']) {
                            'green' => 'bg-positivus-green',
                            'dark' => 'bg-positivus-dark text-white',
                            default => 'bg-positivus-gray',
                        };
                        $badgeClass = $service['badge'] === 'green' ? 'bg-positivus-green text-positivus-dark' : 'bg-white text-positivus-dark';
                    @endphp
                    <article class="service-card {{ $cardClass }} grid gap-8 p-8 sm:grid-cols-[1fr_210px] sm:p-12">
                        <div class="flex min-h-52 flex-col justify-between gap-10">
                            <h3 class="max-w-[260px] text-3xl font-medium leading-tight">
                                @foreach (explode('|', $service['title']) as $line)
                                    <span class="{{ $badgeClass }} mb-1 inline-block rounded-md px-2 leading-tight">{{ $line }}</span>
                                @endforeach
                            </h3>
                            <a href="#contact" class="group inline-flex items-center gap-4 text-xl">
                                <span class="grid size-10 place-items-center rounded-full {{ $isDark ? 'bg-white text-positivus-dark' : 'bg-positivus-dark text-positivus-green' }} transition-transform group-hover:rotate-[-35deg]">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
                                </span>
                                Learn more
                            </a>
                        </div>
                        <div class="flex items-center justify-center">
                            <img class="h-auto w-full max-w-[220px]" src="{{ asset('images/positivus/' . $service['image']) }}" alt="{{ $service['title'] }} illustration" loading="lazy">
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Proposal CTA --}}
        <section class="container-page py-20">
            <div class="relative overflow-hidden rounded-[2.8rem] bg-positivus-gray p-8 md:p-14">
                <div class="max-w-[520px]">
                    <h2 class="text-3xl font-medium">Let&apos;s make things happen</h2>
                    <p class="mt-6 text-lg leading-7">Contact us today to learn more about how our digital marketing services can help your business grow and succeed online.</p>
                    <a class="button-dark mt-7" href="#contact">Get your free proposal</a>
                </div>
                <img class="pointer-events-none absolute right-14 top-1/2 hidden w-[360px] -translate-y-1/2 lg:block" src="{{ asset('images/positivus/cta-illustration.svg') }}" alt="" loading="lazy">
            </div>
        </section>

        {{-- Case Studies --}}
        <section id="use-cases" class="container-page py-10">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <h2 class="section-kicker">Case Studies</h2>
                <p class="max-w-[580px] text-lg leading-7">Explore Real-Life Examples of Our Proven Digital Marketing Success through Our Case Studies</p>
            </div>

            <div class="mt-16 grid overflow-hidden rounded-[2.8rem] bg-positivus-dark px-8 py-10 text-white md:px-12 md:py-14 lg:grid-cols-3 lg:px-0">
                @foreach ([
                    'For a local restaurant, we implemented a targeted PPC campaign that resulted in a 50% increase in website traffic and a 25% increase in sales.',
                    'For a B2B software company, we developed an SEO strategy that resulted in a first page ranking for key keywords and a 200% increase in organic traffic.',
                    'For a national retail chain, we created a social media marketing campaign that increased followers by 25% and generated a 20% increase in online sales.',
                ] as $caseStudy)
                    <article class="border-white/30 py-6 lg:border-r lg:px-16 lg:py-0 last:lg:border-r-0">
                        <p class="text-[15px] leading-6">{{ $caseStudy }}</p>
                        <a href="#contact" class="mt-5 inline-flex items-center gap-3 text-base text-positivus-green transition-transform hover:translate-x-1">
                            Learn more
                            <svg class="size-5 rotate-[-20deg]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Working Process --}}
        <section id="about-us" class="container-page py-20">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <h2 class="section-kicker">Our Working Process</h2>
                <p class="max-w-[330px] text-lg leading-7">Step-by-Step Guide to Achieving Your Business Goals</p>
            </div>

            <div class="mt-20 space-y-7" data-process-accordion>
                @foreach ($processSteps as $step)
                    <article class="process-item rounded-[2.2rem] border border-positivus-dark bg-positivus-gray p-7 shadow-[0_5px_0_#191a23] md:p-10 {{ $loop->first ? 'is-open' : '' }}" data-process-item>
                        <button type="button" class="flex w-full items-center justify-between gap-5 text-left" data-process-trigger aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="process-panel-{{ $loop->index }}">
                            <span class="flex items-center gap-5 md:gap-7">
                                <span class="text-4xl font-medium md:text-6xl">{{ $step['number'] }}</span>
                                <span class="text-xl font-medium md:text-3xl">{{ $step['title'] }}</span>
                            </span>
                            <span class="grid size-12 shrink-0 place-items-center rounded-full border border-positivus-dark bg-positivus-gray text-3xl leading-none">
                                <span data-process-plus class="{{ $loop->first ? 'hidden' : '' }}">+</span>
                                <span data-process-minus class="{{ $loop->first ? '' : 'hidden' }}">-</span>
                            </span>
                        </button>
                        <div id="process-panel-{{ $loop->index }}" class="process-panel overflow-hidden {{ $loop->first ? '' : 'h-0 opacity-0' }}" data-process-panel>
                            <div class="mt-7 border-t border-positivus-dark pt-7 text-lg leading-8">
                                {{ $step['body'] }}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Team --}}
        <section class="container-page py-10">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <h2 class="section-kicker">Team</h2>
                <p class="max-w-[480px] text-lg leading-7">Meet the skilled and experienced team behind our successful digital marketing strategies</p>
            </div>

            <div class="mt-16 grid gap-x-10 gap-y-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($team as $member)
                    <article class="team-card rounded-[2rem] border border-positivus-dark bg-white px-8 py-9 shadow-[0_5px_0_#191a23]">
                        <div class="flex items-end gap-5 border-b border-positivus-dark pb-6">
                            <div class="avatar-flower shrink-0" aria-hidden="true">
                                <span>{{ collect(explode(' ', $member['name']))->map(fn ($part) => $part[0])->take(2)->implode('') }}</span>
                            </div>
                            <div class="min-w-0 pb-1">
                                <h3 class="text-base font-semibold leading-tight">{{ $member['name'] }}</h3>
                                <p class="mt-1 text-sm leading-5">{{ $member['role'] }}</p>
                            </div>
                            <a href="#" aria-label="{{ $member['name'] }} LinkedIn" class="mb-auto ml-auto grid size-8 shrink-0 place-items-center rounded-full bg-black text-positivus-green text-sm font-bold leading-none">in</a>
                        </div>
                        <p class="mt-6 text-sm leading-5">{{ $member['bio'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-10 flex justify-end">
                <a class="button-dark min-h-0 w-full rounded-xl px-12 py-5 text-base sm:w-auto" href="#contact">See all team</a>
            </div>
        </section>

        {{-- Testimonials --}}
        <section class="container-page py-20">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <h2 class="section-kicker">Testimonials</h2>
                <p class="max-w-[480px] text-lg leading-7">Hear from Our Satisfied Clients: Read Our Testimonials to Learn More about Our Digital Marketing Services</p>
            </div>

            <div class="testimonial-slider mt-20 overflow-hidden rounded-[2.8rem] bg-positivus-dark py-14 text-white md:py-20" data-testimonial-slider>
                <div class="overflow-hidden">
                    <div class="testimonial-track flex transition-transform duration-500 ease-out" data-testimonial-track>
                        @foreach ($testimonials as $testimonial)
                            <figure class="testimonial-slide shrink-0 px-6 md:px-8">
                                <blockquote class="testimonial-bubble relative rounded-[2rem] border border-positivus-green p-8 text-lg leading-8 md:p-12">
                                    <p>"{{ $testimonial['quote'] }}"</p>
                                </blockquote>
                                <figcaption class="mt-8 pl-8 md:pl-20">
                                    <div class="font-semibold text-positivus-green">{{ $testimonial['author'] }}</div>
                                    <div>{{ $testimonial['role'] }}</div>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>

                <div class="mt-14 flex items-center justify-center gap-10 md:gap-20">
                    <button type="button" class="testimonial-arrow" data-testimonial-prev aria-label="Previous testimonial">
                        <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    </button>

                    <div class="flex items-center gap-4" aria-label="Choose testimonial">
                        @foreach ($testimonials as $testimonial)
                            <button type="button" class="testimonial-dot" data-testimonial-dot="{{ $loop->index }}" aria-label="Show testimonial {{ $loop->iteration }}" @if ($loop->first) aria-current="true" @endif>
                                <svg class="size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M8 1.5 9.8 6.2l4.7 1.8-4.7 1.8L8 14.5 6.2 9.8 1.5 8l4.7-1.8L8 1.5Z"/></svg>
                            </button>
                        @endforeach
                    </div>

                    <button type="button" class="testimonial-arrow" data-testimonial-next aria-label="Next testimonial">
                        <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </section>

        {{-- Contact --}}
        <section id="contact" class="container-page py-10">
            <div class="flex flex-col gap-7 md:flex-row md:items-center">
                <h2 class="section-kicker">Contact Us</h2>
                <p class="max-w-[330px] text-lg leading-7">Connect with Us: Let&apos;s Discuss Your Digital Marketing Needs</p>
            </div>

            <div class="mt-20 overflow-hidden rounded-[2.8rem] bg-positivus-gray p-8 md:p-14 lg:grid lg:grid-cols-[minmax(0,0.85fr)_minmax(360px,1fr)]">
                <form class="max-w-[560px]" method="POST" action="{{ route('landing.contact') }}">
                    @csrf
                    @if (session('status'))
                        <div class="mb-6 rounded-2xl border border-positivus-dark bg-positivus-green px-5 py-4">{{ session('status') }}</div>
                    @endif

                    <div class="mb-10 flex gap-8">
                        <label class="inline-flex items-center gap-3 text-lg">
                            <input class="size-6 accent-positivus-green" type="radio" name="intent" checked>
                            Say Hi
                        </label>
                        <label class="inline-flex items-center gap-3 text-lg">
                            <input class="size-6 accent-positivus-green" type="radio" name="intent">
                            Get a Quote
                        </label>
                    </div>

                    <div class="space-y-6">
                        <label class="block">
                            <span class="mb-2 block">Name</span>
                            <input name="name" value="{{ old('name') }}" class="min-h-14 w-full rounded-xl border border-positivus-dark bg-white px-5 outline-none transition-shadow focus:shadow-[0_0_0_4px_rgba(185,255,102,0.65)]" autocomplete="name" required>
                            @error('name')<span class="mt-2 block text-sm text-red-700">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="mb-2 block">Email*</span>
                            <input type="email" name="email" value="{{ old('email') }}" class="min-h-14 w-full rounded-xl border border-positivus-dark bg-white px-5 outline-none transition-shadow focus:shadow-[0_0_0_4px_rgba(185,255,102,0.65)]" autocomplete="email" required>
                            @error('email')<span class="mt-2 block text-sm text-red-700">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="mb-2 block">Message*</span>
                            <textarea name="message" rows="7" class="w-full resize-y rounded-xl border border-positivus-dark bg-white px-5 py-4 outline-none transition-shadow focus:shadow-[0_0_0_4px_rgba(185,255,102,0.65)]" required>{{ old('message') }}</textarea>
                            @error('message')<span class="mt-2 block text-sm text-red-700">{{ $message }}</span>@enderror
                        </label>
                    </div>

                    <button class="button-dark mt-10 w-full" type="submit">Send Message</button>
                </form>

                <div class="relative hidden min-h-[520px] lg:block" aria-hidden="true">
                    <img class="absolute -right-44 top-1/2 w-[520px] -translate-y-1/2" src="{{ asset('images/positivus/contact-illustration.svg') }}" alt="" loading="lazy">
                </div>
            </div>
        </section>
    </main>

    <footer class="container-page mt-20 rounded-t-[2.8rem] bg-positivus-dark px-5 py-12 text-white md:px-14 md:py-14">
        <div class="flex flex-col items-center gap-9 lg:flex-row lg:justify-between">
            <a href="{{ route('landing') }}" class="flex items-center gap-3" aria-label="Positivus home">
                <span class="grid size-8 place-items-center rounded-full bg-white text-positivus-dark">
                    <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.75 14.42 8l6.7-1.1-4.35 5.2 4.35 5.2-6.7-1.1L12 22.25 9.58 16.2l-6.7 1.1 4.35-5.2-4.35-5.2L9.58 8 12 1.75Z" /></svg>
                </span>
                <span class="text-3xl font-semibold tracking-tight">Positivus</span>
            </a>

            <nav class="flex flex-col items-center gap-4 text-lg md:flex-row md:gap-10" aria-label="Footer navigation">
                @foreach ($navItems as $item)
                    <a class="underline-offset-4 hover:underline" href="#{{ \Illuminate\Support\Str::slug($item) }}">{{ $item }}</a>
                @endforeach
            </nav>

            <div class="hidden items-center gap-5 lg:flex" aria-label="Social links">
                @foreach (['in', 'f', 'x'] as $social)
                    <a href="#" class="grid size-8 place-items-center rounded-full bg-white text-sm font-bold text-positivus-dark transition-transform hover:-translate-y-0.5" aria-label="Positivus {{ $social }} profile">{{ $social }}</a>
                @endforeach
            </div>
        </div>

        <div class="mt-16 grid items-center gap-10 border-b border-white pb-12 lg:grid-cols-[minmax(260px,0.75fr)_minmax(520px,1fr)]">
            <address class="text-center not-italic lg:text-left">
                <h2 class="inline-flex rounded-md bg-positivus-green px-2 text-xl font-medium text-positivus-dark">Contact us:</h2>
                <div class="mt-7 space-y-5 text-lg leading-7">
                    <p>Email: info@positivus.com</p>
                    <p>Phone: 555-567-8901</p>
                    <p class="mx-auto max-w-[360px] lg:mx-0">Address: 1234 Main St<br>Moonstone City, Stardust State 12345</p>
                </div>
            </address>

            <form class="grid gap-5 rounded-[1.25rem] bg-[#292A32] p-8 md:grid-cols-[minmax(0,1fr)_auto] md:p-14" method="POST" action="{{ route('landing.contact') }}">
                @csrf
                <label class="sr-only" for="footer-email">Email</label>
                <input id="footer-email" type="email" name="email" placeholder="Email" class="min-h-16 rounded-xl border border-white bg-transparent px-6 text-lg text-white placeholder:text-white outline-none transition-shadow focus:shadow-[0_0_0_4px_rgba(185,255,102,0.35)]" required>
                <input type="hidden" name="name" value="Newsletter subscriber">
                <input type="hidden" name="message" value="Please contact me about Positivus services.">
                <button class="min-h-16 rounded-xl bg-positivus-green px-8 text-lg text-positivus-dark transition-transform hover:-translate-y-0.5" type="submit">Subscribe to news</button>
            </form>
        </div>

        <div class="mt-10 flex flex-col items-center gap-5 text-lg text-white md:flex-row">
            <p>&copy; {{ date('Y') }} Positivus. All Rights Reserved.</p>
            <a class="underline underline-offset-4 hover:text-positivus-green" href="#">Privacy Policy</a>
            <div class="flex items-center gap-5 lg:hidden" aria-label="Social links">
                @foreach (['in', 'f', 'x'] as $social)
                    <a href="#" class="grid size-8 place-items-center rounded-full bg-white text-sm font-bold text-positivus-dark" aria-label="Positivus {{ $social }} profile">{{ $social }}</a>
                @endforeach
            </div>
        </div>
    </footer>
</body>
</html>
