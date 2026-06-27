@php
    $navItems = ['About us', 'Services', 'Use Cases', 'Pricing', 'Blog'];

    $services = [
        [
            'title' => ['Search engine', 'optimization'],
            'tone' => 'gray',
            'label' => 'green',
            'image' => 'service-seo.svg',
        ],
        [
            'title' => ['Pay-per-click', 'advertising'],
            'tone' => 'green',
            'label' => 'white',
            'image' => 'service-ppc.svg',
        ],
        [
            'title' => ['Social Media', 'Marketing'],
            'tone' => 'dark',
            'label' => 'white',
            'image' => 'service-social.svg',
        ],
        [
            'title' => ['Email', 'Marketing'],
            'tone' => 'gray',
            'label' => 'green',
            'image' => 'service-email.svg',
        ],
        [
            'title' => ['Content', 'Creation'],
            'tone' => 'green',
            'label' => 'white',
            'image' => 'service-content.svg',
        ],
        [
            'title' => ['Analytics and', 'Tracking'],
            'tone' => 'dark',
            'label' => 'green',
            'image' => 'service-analytics.svg',
        ],
    ];

    $processSteps = [
        ['number' => '01', 'title' => 'Consultation', 'body' => 'During the initial consultation, we discuss your business goals, target audience, and current marketing efforts. This helps us understand your needs and tailor our services to best fit your objectives.'],
        ['number' => '02', 'title' => 'Research and Strategy Development', 'body' => 'We research your market, competitors, search behavior, audience signals, and channel opportunities before building a focused growth strategy.'],
        ['number' => '03', 'title' => 'Implementation', 'body' => 'Our team launches the agreed campaigns, content, tracking, and optimization workflows with clear ownership across every channel.'],
        ['number' => '04', 'title' => 'Monitoring and Optimization', 'body' => 'We monitor performance data, test improvements, and continuously optimize campaigns to improve reach, conversions, and return on investment.'],
        ['number' => '05', 'title' => 'Reporting and Communication', 'body' => 'You receive clear reporting and practical recommendations so progress stays visible and decisions stay grounded in real data.'],
        ['number' => '06', 'title' => 'Continual Improvement', 'body' => 'We refine the strategy as your goals evolve, using new insights to keep performance moving in the right direction.'],
    ];

    $team = [
        ['name' => 'John Smith', 'role' => 'CEO and Founder', 'bio' => '10+ years of experience in digital marketing. Expertise in SEO, PPC, and content strategy.'],
        ['name' => 'Jane Doe', 'role' => 'Director of Operations', 'bio' => '7+ years of experience in project management and team leadership for complex campaigns.'],
        ['name' => 'Michael Brown', 'role' => 'Senior SEO Specialist', 'bio' => '5+ years of experience in technical SEO, keyword research, and content optimization.'],
        ['name' => 'Emily Johnson', 'role' => 'PPC Manager', 'bio' => '3+ years of experience in paid search, social advertising, and conversion tracking.'],
        ['name' => 'Brian Williams', 'role' => 'Social Media Specialist', 'bio' => '4+ years of experience in social strategy, creative planning, and engagement growth.'],
        ['name' => 'Sarah Kim', 'role' => 'Content Creator', 'bio' => '4+ years of experience in brand storytelling, landing page copy, and email campaigns.'],
    ];

    $testimonials = [
        ['quote' => 'We have been working with Positivus for the past year and have seen a significant increase in website traffic and leads. Their team is professional, responsive, and invested in our success.', 'author' => 'John Smith', 'role' => 'Marketing Director at XYZ Corp'],
        ['quote' => 'The team translated our goals into a clear campaign plan and kept improving it every month. The reporting was easy to understand and the results were measurable.', 'author' => 'Sarah Lee', 'role' => 'Founder at BrightPath'],
        ['quote' => 'Positivus brought structure to our channels without slowing us down. We finally have search, content, and ads working together.', 'author' => 'Michael Chen', 'role' => 'Growth Lead at Northstar'],
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Positivus digital marketing landing page">
    <title>Positivus Landing Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --green: #b9ff66;
            --dark: #191a23;
            --gray: #f3f3f3;
        }

        html {
            scroll-behavior: smooth;
            scrollbar-color: var(--green) var(--dark);
            scrollbar-width: thin;
        }

        body {
            overflow-x: hidden;
        }

        body::-webkit-scrollbar {
            width: 12px;
        }

        body::-webkit-scrollbar-track {
            background: var(--dark);
        }

        body::-webkit-scrollbar-thumb {
            border: 3px solid var(--dark);
            border-radius: 999px;
            background: var(--green);
        }

        .bb-shell {
            width: min(100% - 2rem, 1240px);
            margin-inline: auto;
        }

        .figma-hero-art {
            width: min(100%, 600px);
            aspect-ratio: 600 / 515;
        }

        .figma-service-art {
            width: 210px;
            height: 170px;
        }

        .figma-cta-art {
            width: min(34vw, 360px);
            aspect-ratio: 360 / 300;
        }

        .figma-contact-art {
            width: min(42vw, 520px);
            aspect-ratio: 1 / 1;
        }

        .figma-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 600ms ease, transform 600ms ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .logo-track {
            animation: logo-slide 24s linear infinite;
        }

        .logo-marquee:hover .logo-track {
            animation-play-state: paused;
        }

        .process-panel {
            height: 0;
            opacity: 0;
            overflow: hidden;
            transition: height 280ms ease, opacity 220ms ease;
        }

        .process-card.is-open .process-panel {
            opacity: 1;
        }

        .process-card.is-open {
            background: var(--green);
        }

        .testimonial-slide {
            width: min(100%, 606px);
            flex: 0 0 auto;
            opacity: .45;
            transform: scale(.94);
            transition: opacity 300ms ease, transform 300ms ease;
        }

        .testimonial-slide.is-active {
            opacity: 1;
            transform: scale(1);
        }

        @keyframes logo-slide {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }

        @media (max-width: 767px) {
            .figma-service-art {
                width: min(100%, 210px);
                height: 150px;
            }

            .testimonial-slide {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: 1ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 1ms !important;
            }
        }
    </style>
</head>
<body class="bg-white font-sans text-positivus-dark antialiased">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-xl focus:bg-positivus-green focus:px-4 focus:py-3">Skip to content</a>

    <header class="bb-shell py-8 lg:py-[60px]" data-mobile-nav>
        <nav class="flex items-center justify-between gap-8" aria-label="Primary navigation">
            <a href="#" class="group flex items-center gap-3" aria-label="Positivus home">
                <span class="grid size-9 place-items-center rounded-full bg-positivus-dark text-positivus-green transition-transform duration-300 group-hover:rotate-12">
                    <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 1.75 14.42 8l6.7-1.1-4.35 5.2 4.35 5.2-6.7-1.1L12 22.25 9.58 16.2l-6.7 1.1 4.35-5.2-4.35-5.2L9.58 8 12 1.75Z" />
                    </svg>
                </span>
                <span class="text-[2rem] font-semibold leading-none tracking-normal">Positivus</span>
            </a>

            <button type="button" class="grid size-11 place-items-center rounded-xl border border-positivus-dark lg:hidden" data-mobile-nav-toggle aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <svg data-mobile-open class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                <svg data-mobile-close class="hidden size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18"/></svg>
            </button>

            <div class="hidden items-center gap-10 lg:flex">
                @foreach ($navItems as $item)
                    <a href="#{{ strtolower(str_replace(' ', '-', $item)) }}" class="text-xl transition-colors duration-200 hover:text-black/55">{{ $item }}</a>
                @endforeach
                <a href="#contact" class="inline-flex min-h-[68px] items-center justify-center rounded-[14px] border border-positivus-dark px-[35px] text-xl transition-colors hover:bg-positivus-dark hover:text-white">Request a quote</a>
            </div>
        </nav>

        <div id="mobile-menu" data-mobile-menu hidden class="mt-6 rounded-[28px] border border-positivus-dark bg-white p-4 shadow-[0_5px_0_#191a23] lg:hidden">
            <div class="grid gap-2">
                @foreach ($navItems as $item)
                    <a href="#{{ strtolower(str_replace(' ', '-', $item)) }}" class="rounded-2xl px-4 py-3 text-lg hover:bg-positivus-gray" data-mobile-link>{{ $item }}</a>
                @endforeach
                <a href="#contact" class="mt-2 inline-flex min-h-14 items-center justify-center rounded-2xl bg-positivus-dark px-5 text-white" data-mobile-link>Request a quote</a>
            </div>
        </div>
    </header>

    <main id="main-content">
        <section class="bb-shell grid items-center gap-10 pb-16 lg:grid-cols-[531px_minmax(0,1fr)] lg:gap-[109px] lg:pb-[70px]">
            <div class="reveal">
                <h1 class="text-[clamp(2.65rem,5vw,3.75rem)] font-medium leading-[1.15] tracking-normal">Navigating the digital landscape for success</h1>
                <p class="mt-[35px] max-w-[498px] text-xl leading-7">Our digital marketing agency helps businesses grow and succeed online through a range of services including SEO, PPC, social media marketing, and content creation.</p>
                <a href="#contact" class="mt-[35px] inline-flex min-h-[68px] w-full items-center justify-center rounded-[14px] bg-positivus-dark px-[35px] text-xl text-white transition duration-200 hover:-translate-y-0.5 hover:shadow-[0_14px_28px_rgba(25,26,35,.18)] sm:w-auto">Book a consultation</a>
            </div>

            <div class="figma-hero-art reveal mx-auto lg:mx-0" style="transition-delay: 100ms">
                <img class="figma-img" src="{{ asset('images/positivus/Illustration (1).png') }}" alt="Digital marketing illustration">
            </div>
        </section>

        <section class="bb-shell overflow-hidden pb-[92px]" aria-label="Trusted brands">
            <div class="logo-marquee opacity-50 grayscale [mask-image:linear-gradient(90deg,transparent,#000_8%,#000_92%,transparent)]">
                <div class="logo-track flex w-max items-center gap-[96px]">
                    @foreach (range(1, 2) as $set)
                        <div class="flex items-center gap-[96px] pr-[96px]" @if ($set === 2) aria-hidden="true" @endif>
                            @foreach (['amazon', 'dribbble', 'HubSpot', 'Notion', 'NETFLIX', 'Zoom'] as $partner)
                                <span class="shrink-0 text-3xl font-semibold tracking-normal">{{ $partner }}</span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="services" class="bb-shell py-10">
            <div class="reveal flex flex-col gap-[40px] md:flex-row md:items-center">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-[40px] font-medium leading-[1.28]">Services</h2>
                <p class="max-w-[580px] text-lg leading-[1.28]">At our digital marketing agency, we offer a range of services to help businesses grow and succeed online. These services include:</p>
            </div>

            <div class="mt-20 grid gap-10 lg:grid-cols-2">
                @foreach ($services as $service)
                    @php
                        $cardClass = match ($service['tone']) {
                            'green' => 'bg-positivus-green',
                            'dark' => 'bg-positivus-dark text-white',
                            default => 'bg-positivus-gray',
                        };
                        $labelClass = $service['label'] === 'green' ? 'bg-positivus-green text-positivus-dark' : 'bg-white text-positivus-dark';
                        $iconClass = $service['tone'] === 'dark' ? 'bg-white text-positivus-dark' : 'bg-positivus-dark text-positivus-green';
                    @endphp
                    <article class="reveal grid min-h-[310px] items-center gap-8 rounded-[45px] border border-positivus-dark {{ $cardClass }} p-[49px] shadow-[0_5px_0_#191a23] transition duration-200 hover:-translate-y-1 hover:shadow-[0_9px_0_#191a23] md:grid-cols-[minmax(0,1fr)_210px]">
                        <div class="flex min-h-[210px] flex-col justify-between gap-10">
                            <h3 class="max-w-[230px] text-3xl font-medium leading-[1.28]">
                                @foreach ($service['title'] as $line)
                                    <span class="{{ $labelClass }} mb-0.5 inline-block rounded-[7px] px-[7px]">{{ $line }}</span>
                                @endforeach
                            </h3>
                            <a href="#contact" class="group inline-flex items-center gap-[15px] text-xl">
                                <span class="{{ $iconClass }} grid size-[41px] place-items-center rounded-full transition-transform duration-200 group-hover:rotate-[-35deg]">
                                    <svg class="size-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
                                </span>
                                <span class="hidden sm:inline">Learn more</span>
                            </a>
                        </div>
                        <div class="figma-service-art mx-auto shrink-0">
                            <img class="figma-img" src="{{ asset('images/positivus/' . $service['image']) }}" alt="{{ implode(' ', $service['title']) }} illustration" loading="lazy">
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="bb-shell py-[70px]">
            <div class="reveal relative overflow-hidden rounded-[45px] bg-positivus-gray px-[60px] py-[60px]">
                <div class="max-w-[500px]">
                    <h2 class="text-3xl font-medium leading-[1.28]">Let&apos;s make things happen</h2>
                    <p class="mt-[26px] text-lg leading-[1.28]">Contact us today to learn more about how our digital marketing services can help your business grow and succeed online.</p>
                    <a href="#contact" class="mt-[26px] inline-flex min-h-[68px] items-center justify-center rounded-[14px] bg-positivus-dark px-[35px] text-xl text-white transition duration-200 hover:-translate-y-0.5">Get your free proposal</a>
                </div>
                <div class="figma-cta-art pointer-events-none absolute right-[135px] top-1/2 hidden -translate-y-1/2 lg:block">
                    <img class="figma-img" src="{{ asset('images/positivus/cta-illustration.svg') }}" alt="" loading="lazy">
                </div>
            </div>
        </section>

        <section id="use-cases" class="bb-shell py-10">
            <div class="reveal flex flex-col gap-[40px] md:flex-row md:items-center">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-[40px] font-medium leading-[1.28]">Case Studies</h2>
                <p class="max-w-[580px] text-lg leading-[1.28]">Explore Real-Life Examples of Our Proven Digital Marketing Success through Our Case Studies</p>
            </div>

            <div class="reveal mt-20 grid overflow-hidden rounded-[45px] bg-positivus-dark px-[60px] py-[70px] text-white lg:grid-cols-3 lg:px-0">
                @foreach ([
                    'For a local restaurant, we implemented a targeted PPC campaign that resulted in a 50% increase in website traffic and a 25% increase in sales.',
                    'For a B2B software company, we developed an SEO strategy that resulted in a first page ranking for key keywords and a 200% increase in organic traffic.',
                    'For a national retail chain, we created a social media marketing campaign that increased followers by 25% and generated a 20% increase in online sales.',
                ] as $caseStudy)
                    <article class="border-white/30 py-6 lg:border-r lg:px-16 lg:py-0 last:lg:border-r-0">
                        <p class="text-lg leading-[1.28]">{{ $caseStudy }}</p>
                        <a href="#contact" class="mt-5 inline-flex items-center gap-[15px] text-xl text-positivus-green transition-transform hover:translate-x-1">
                            Learn more
                            <svg class="size-5 rotate-[-20deg]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
                        </a>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="about-us" class="bb-shell py-[70px]">
            <div class="reveal flex flex-col gap-[40px] md:flex-row md:items-center">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-[40px] font-medium leading-[1.28]">Our Working Process</h2>
                <p class="max-w-[292px] text-lg leading-[1.28]">Step-by-Step Guide to Achieving Your Business Goals</p>
            </div>

            <div class="mt-20 space-y-[30px]" data-accordion>
                @foreach ($processSteps as $step)
                    <article class="process-card reveal rounded-[45px] border border-positivus-dark bg-positivus-gray px-[60px] py-[41px] shadow-[0_5px_0_#191a23] transition-colors duration-200 {{ $loop->first ? 'is-open' : '' }}" data-accordion-item>
                        <button type="button" class="flex w-full items-center justify-between gap-5 text-left" data-accordion-trigger aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                            <span class="flex items-center gap-[25px]">
                                <span class="text-[clamp(2.25rem,5vw,3.75rem)] font-medium leading-none">{{ $step['number'] }}</span>
                                <span class="text-[clamp(1.25rem,3vw,1.875rem)] font-medium leading-[1.28]">{{ $step['title'] }}</span>
                            </span>
                            <span class="grid size-[58px] shrink-0 place-items-center rounded-full border border-positivus-dark bg-positivus-gray text-[40px] leading-none">
                                <span data-plus class="{{ $loop->first ? 'hidden' : '' }}">+</span>
                                <span data-minus class="{{ $loop->first ? '' : 'hidden' }}">-</span>
                            </span>
                        </button>
                        <div class="process-panel" data-accordion-panel>
                            <div class="mt-[30px] border-t border-positivus-dark pt-[30px] text-lg leading-[1.28]">
                                {{ $step['body'] }}
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="bb-shell py-10">
            <div class="reveal flex flex-col gap-[40px] md:flex-row md:items-center">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-[40px] font-medium leading-[1.28]">Team</h2>
                <p class="max-w-[473px] text-lg leading-[1.28]">Meet the skilled and experienced team behind our successful digital marketing strategies</p>
            </div>

            <div class="mt-20 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($team as $member)
                    <article class="reveal rounded-[45px] border border-positivus-dark bg-white px-[35px] py-10 shadow-[0_5px_0_#191a23] transition duration-200 hover:-translate-y-1 hover:shadow-[0_9px_0_#191a23]">
                        <div class="flex items-end gap-5 border-b border-positivus-dark pb-7">
                            <div class="grid size-[102px] shrink-0 place-items-center rounded-full bg-positivus-green text-2xl font-semibold">
                                {{ collect(explode(' ', $member['name']))->map(fn ($part) => $part[0])->take(2)->implode('') }}
                            </div>
                            <div class="min-w-0 pb-1">
                                <h3 class="text-xl font-medium leading-[1.28]">{{ $member['name'] }}</h3>
                                <p class="mt-1 text-lg leading-[1.28]">{{ $member['role'] }}</p>
                            </div>
                            <a href="#" class="mb-auto ml-auto grid size-[34px] shrink-0 place-items-center rounded-full bg-black text-base font-bold text-positivus-green" aria-label="{{ $member['name'] }} LinkedIn">in</a>
                        </div>
                        <p class="mt-7 text-lg leading-[1.28]">{{ $member['bio'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="bb-shell py-[70px]">
            <div class="reveal flex flex-col gap-[40px] md:flex-row md:items-center">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-[40px] font-medium leading-[1.28]">Testimonials</h2>
                <p class="max-w-[473px] text-lg leading-[1.28]">Hear from Our Satisfied Clients: Read Our Testimonials to Learn More about Our Digital Marketing Services</p>
            </div>

            <div class="reveal mt-20 overflow-hidden rounded-[45px] bg-positivus-dark py-[84px] text-white" data-testimonials>
                <div class="overflow-hidden">
                    <div class="flex gap-[50px] px-[50px] transition-transform duration-500 ease-out" data-testimonial-track>
                        @foreach ($testimonials as $testimonial)
                            <figure class="testimonial-slide {{ $loop->first ? 'is-active' : '' }}">
                                <blockquote class="relative rounded-[45px] border border-positivus-green p-[48px] text-lg leading-[1.28] after:absolute after:bottom-[-16px] after:left-[55px] after:size-8 after:rotate-45 after:border-b after:border-r after:border-positivus-green after:bg-positivus-dark">
                                    <p>"{{ $testimonial['quote'] }}"</p>
                                </blockquote>
                                <figcaption class="mt-[48px] pl-[80px]">
                                    <div class="text-xl font-medium text-positivus-green">{{ $testimonial['author'] }}</div>
                                    <div class="text-lg">{{ $testimonial['role'] }}</div>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>

                <div class="mt-[75px] flex items-center justify-center gap-[80px]">
                    <button type="button" class="grid size-12 place-items-center transition hover:text-positivus-green" data-testimonial-prev aria-label="Previous testimonial">
                        <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                    </button>
                    <div class="flex items-center gap-[19px]">
                        @foreach ($testimonials as $testimonial)
                            <button type="button" class="text-white transition hover:scale-110 hover:text-positivus-green aria-current:text-positivus-green" data-testimonial-dot="{{ $loop->index }}" aria-label="Show testimonial {{ $loop->iteration }}" @if ($loop->first) aria-current="true" @endif>
                                <svg class="size-[14px]" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true"><path d="M8 1.5 9.8 6.2l4.7 1.8-4.7 1.8L8 14.5 6.2 9.8 1.5 8l4.7-1.8L8 1.5Z"/></svg>
                            </button>
                        @endforeach
                    </div>
                    <button type="button" class="grid size-12 place-items-center transition hover:text-positivus-green" data-testimonial-next aria-label="Next testimonial">
                        <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </section>

        <section id="contact" class="bb-shell py-10">
            <div class="reveal flex flex-col gap-[40px] md:flex-row md:items-center">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-[40px] font-medium leading-[1.28]">Contact Us</h2>
                <p class="max-w-[323px] text-lg leading-[1.28]">Connect with Us: Let&apos;s Discuss Your Digital Marketing Needs</p>
            </div>

            <div class="reveal mt-20 overflow-hidden rounded-[45px] bg-positivus-gray p-[60px] lg:grid lg:grid-cols-[556px_minmax(0,1fr)]">
                <form class="max-w-[556px]" method="POST" action="{{ route('landing.contact') }}">
                    @csrf
                    <div class="mb-10 flex flex-wrap gap-[35px]">
                        <label class="inline-flex items-center gap-[14px] text-lg">
                            <input class="size-7 accent-positivus-green" type="radio" name="intent" checked>
                            Say Hi
                        </label>
                        <label class="inline-flex items-center gap-[14px] text-lg">
                            <input class="size-7 accent-positivus-green" type="radio" name="intent">
                            Get a Quote
                        </label>
                    </div>

                    <div class="space-y-[25px]">
                        <label class="block">
                            <span class="mb-[5px] block text-base">Name</span>
                            <input name="name" class="min-h-[59px] w-full rounded-[14px] border border-positivus-dark bg-white px-[30px] text-lg outline-none transition focus:shadow-[0_0_0_4px_rgba(185,255,102,.65)]" autocomplete="name">
                        </label>
                        <label class="block">
                            <span class="mb-[5px] block text-base">Email*</span>
                            <input type="email" name="email" class="min-h-[59px] w-full rounded-[14px] border border-positivus-dark bg-white px-[30px] text-lg outline-none transition focus:shadow-[0_0_0_4px_rgba(185,255,102,.65)]" autocomplete="email" required>
                        </label>
                        <label class="block">
                            <span class="mb-[5px] block text-base">Message*</span>
                            <textarea name="message" rows="7" class="w-full resize-y rounded-[14px] border border-positivus-dark bg-white px-[30px] py-[18px] text-lg outline-none transition focus:shadow-[0_0_0_4px_rgba(185,255,102,.65)]" required></textarea>
                        </label>
                    </div>

                    <button class="mt-10 inline-flex min-h-[68px] w-full items-center justify-center rounded-[14px] bg-positivus-dark px-[35px] text-xl text-white transition duration-200 hover:-translate-y-0.5" type="submit">Send Message</button>
                </form>

                <div class="relative hidden min-h-[520px] lg:block" aria-hidden="true">
                    <div class="figma-contact-art absolute -right-[300px] top-1/2 -translate-y-1/2">
                        <img class="figma-img" src="{{ asset('images/positivus/Illustration.png') }}" alt="" loading="lazy">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bb-shell mt-[100px] rounded-t-[45px] bg-positivus-dark px-[60px] py-[55px] text-white">
        <div class="flex flex-col items-center gap-8 lg:flex-row lg:justify-between">
            <a href="#" class="flex items-center gap-3" aria-label="Positivus home">
                <span class="grid size-8 place-items-center rounded-full bg-white text-positivus-dark">
                    <svg class="size-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 1.75 14.42 8l6.7-1.1-4.35 5.2 4.35 5.2-6.7-1.1L12 22.25 9.58 16.2l-6.7 1.1 4.35-5.2-4.35-5.2L9.58 8 12 1.75Z" /></svg>
                </span>
                <span class="text-[2rem] font-semibold leading-none">Positivus</span>
            </a>
            <nav class="flex flex-col items-center gap-4 text-lg md:flex-row md:gap-10" aria-label="Footer navigation">
                @foreach ($navItems as $item)
                    <a href="#{{ strtolower(str_replace(' ', '-', $item)) }}" class="underline-offset-4 hover:underline">{{ $item }}</a>
                @endforeach
            </nav>
        </div>

        <div class="mt-[66px] grid items-center gap-10 border-b border-white pb-[50px] lg:grid-cols-[332px_minmax(0,1fr)]">
            <address class="not-italic">
                <h2 class="inline-flex rounded-[7px] bg-positivus-green px-[7px] text-xl font-medium text-positivus-dark">Contact us:</h2>
                <div class="mt-[27px] space-y-5 text-lg leading-[1.28]">
                    <p>Email: info@positivus.com</p>
                    <p>Phone: 555-567-8901</p>
                    <p>Address: 1234 Main St<br>Moonstone City, Stardust State 12345</p>
                </div>
            </address>

            <form class="grid gap-5 rounded-[14px] bg-[#292A32] p-[58px_40px] md:grid-cols-[minmax(0,1fr)_auto]" method="POST" action="{{ route('landing.contact') }}">
                @csrf
                <label class="sr-only" for="footer-email">Email</label>
                <input id="footer-email" type="email" name="email" placeholder="Email" class="min-h-[67px] rounded-[14px] border border-white bg-transparent px-[35px] text-lg text-white outline-none placeholder:text-white focus:shadow-[0_0_0_4px_rgba(185,255,102,.35)]" required>
                <input type="hidden" name="name" value="Newsletter subscriber">
                <input type="hidden" name="message" value="Please contact me about Positivus services.">
                <button class="min-h-[67px] rounded-[14px] bg-positivus-green px-[35px] text-xl text-positivus-dark transition hover:-translate-y-0.5" type="submit">Subscribe to news</button>
            </form>
        </div>

        <div class="mt-[50px] flex flex-col gap-4 text-lg md:flex-row md:items-center md:gap-10">
            <p>&copy; {{ date('Y') }} Positivus. All Rights Reserved.</p>
            <a href="#" class="underline underline-offset-4 hover:text-positivus-green">Privacy Policy</a>
        </div>
    </footer>

    <script>
        (() => {
            const mobileToggle = document.querySelector('[data-mobile-nav-toggle]');
            const mobileMenu = document.querySelector('[data-mobile-menu]');
            const openIcon = document.querySelector('[data-mobile-open]');
            const closeIcon = document.querySelector('[data-mobile-close]');

            if (mobileToggle && mobileMenu) {
                const setOpen = (isOpen) => {
                    mobileMenu.hidden = !isOpen;
                    mobileToggle.setAttribute('aria-expanded', String(isOpen));
                    openIcon?.classList.toggle('hidden', isOpen);
                    closeIcon?.classList.toggle('hidden', !isOpen);
                };

                mobileToggle.addEventListener('click', () => {
                    setOpen(mobileMenu.hidden);
                });

                document.querySelectorAll('[data-mobile-link]').forEach((link) => {
                    link.addEventListener('click', () => setOpen(false));
                });
            }

            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        revealObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.14 });

            document.querySelectorAll('.reveal').forEach((element) => revealObserver.observe(element));

            document.querySelectorAll('[data-accordion-item]').forEach((item) => {
                const trigger = item.querySelector('[data-accordion-trigger]');
                const panel = item.querySelector('[data-accordion-panel]');
                const plus = item.querySelector('[data-plus]');
                const minus = item.querySelector('[data-minus]');

                const syncPanel = () => {
                    const isOpen = item.classList.contains('is-open');
                    panel.style.height = isOpen ? `${panel.scrollHeight}px` : '0px';
                    trigger.setAttribute('aria-expanded', String(isOpen));
                    plus.classList.toggle('hidden', isOpen);
                    minus.classList.toggle('hidden', !isOpen);
                };

                trigger.addEventListener('click', () => {
                    item.classList.toggle('is-open');
                    syncPanel();
                });

                window.addEventListener('resize', syncPanel);
                syncPanel();
            });

            const slider = document.querySelector('[data-testimonials]');
            if (slider) {
                const track = slider.querySelector('[data-testimonial-track]');
                const slides = [...slider.querySelectorAll('.testimonial-slide')];
                const dots = [...slider.querySelectorAll('[data-testimonial-dot]')];
                const prev = slider.querySelector('[data-testimonial-prev]');
                const next = slider.querySelector('[data-testimonial-next]');
                let index = 0;

                const update = () => {
                    const slide = slides[index];
                    const gap = parseFloat(getComputedStyle(track).columnGap || '0');
                    const offset = slide.offsetLeft - track.parentElement.clientWidth / 2 + slide.offsetWidth / 2;
                    track.style.transform = `translateX(${-offset}px)`;
                    slides.forEach((item, slideIndex) => item.classList.toggle('is-active', slideIndex === index));
                    dots.forEach((dot, dotIndex) => {
                        if (dotIndex === index) {
                            dot.setAttribute('aria-current', 'true');
                        } else {
                            dot.removeAttribute('aria-current');
                        }
                    });
                };

                prev.addEventListener('click', () => {
                    index = (index - 1 + slides.length) % slides.length;
                    update();
                });

                next.addEventListener('click', () => {
                    index = (index + 1) % slides.length;
                    update();
                });

                dots.forEach((dot, dotIndex) => {
                    dot.addEventListener('click', () => {
                        index = dotIndex;
                        update();
                    });
                });

                window.addEventListener('resize', update);
                update();
            }
        })();
    </script>
</body>
</html>
