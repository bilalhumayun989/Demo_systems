<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Purpose-built software that makes complex business operations simple.')">
    <title>@yield('title', 'BroshTech Software')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/software-catalog.css') }}?v={{ filemtime(public_path('css/software-catalog.css')) }}">
</head>
<body class="@yield('body_class')">
    <header class="site-header" id="site-header">
        <div class="shell nav-wrap">
            <a class="brand" href="{{ route('software.index') }}" aria-label="BroshTech software home">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 32 32"><path d="M8.5 9.5 16 5l7.5 4.5v4L16 18l-7.5-4.5v-4Z"/><path d="M8.5 18.5 16 23l7.5-4.5M8.5 14v8.5L16 27l7.5-4.5V14"/></svg>
                </span>
                <span>Brosh<span>Tech</span></span>
            </a>

            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Open navigation">
                <span></span><span></span><span></span>
            </button>

            <nav class="site-nav" id="site-nav" aria-label="Main navigation">
                <a href="{{ route('software.index') }}#solutions">Solutions</a>
                <a href="{{ route('software.index') }}#why-us">Why us</a>
                <a href="{{ route('software.contact') }}">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer" id="contact">
        <div class="shell">
            <div class="footer-callout">
                <div>
                    <span>Let’s work together</span>
                    <h2>Better operations start with the right tools.</h2>
                </div>
                <a class="footer-cta" href="{{ route('software.contact') }}">
                    Talk to our team <span aria-hidden="true">→</span>
                </a>
            </div>

            <div class="footer-grid">
                <div class="footer-about">
                <a class="brand brand-light" href="{{ route('software.index') }}">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 32 32"><path d="M8.5 9.5 16 5l7.5 4.5v4L16 18l-7.5-4.5v-4Z"/><path d="M8.5 18.5 16 23l7.5-4.5M8.5 14v8.5L16 27l7.5-4.5V14"/></svg>
                    </span>
                    <span>Brosh<span>Tech</span></span>
                </a>
                    <p>Practical software built around how your business actually works.</p>
                </div>

                <div class="footer-links">
                    <span>Our solutions</span>
                    <div class="footer-solution-links">
                        @foreach(config('software.products') as $footerSlug => $footerProduct)
                            <a href="{{ route('software.show', $footerSlug) }}">{{ $footerProduct['name'] }} <i aria-hidden="true">↗</i></a>
                        @endforeach
                    </div>
                </div>

                <div class="footer-contact">
                    <span class="footer-label">Contact sales</span>
                    <a href="mailto:{{ config('software.sales_email') }}" target="_blank">
                        <span class="footer-contact-icon" aria-hidden="true">@</span>
                        <span><small>Email</small><strong>{{ config('software.sales_email') }}</strong></span>
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('software.sales_phone')) }}?text={{ urlencode('Hello BroshTech, I am interested in your software solutions.') }}" target="_blank" rel="noopener noreferrer">
                        <span class="footer-contact-icon footer-whatsapp-icon" aria-hidden="true">WA</span>
                        <span><small>WhatsApp</small><strong>{{ config('software.sales_phone') }}</strong></span>
                    </a>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} BroshTech. All rights reserved.</span>
                <a href="{{ route('software.index') }}" aria-label="Back to homepage">Back to top <span aria-hidden="true">↑</span></a>
            </div>
        </div>
    </footer>

    <script>
        (function () {
            var header = document.getElementById('site-header');
            var toggle = document.querySelector('.nav-toggle');
            var nav = document.getElementById('site-nav');

            window.addEventListener('scroll', function () {
                header.classList.toggle('scrolled', window.scrollY > 16);
            }, { passive: true });

            toggle.addEventListener('click', function () {
                var isOpen = toggle.getAttribute('aria-expanded') === 'true';
                toggle.setAttribute('aria-expanded', String(!isOpen));
                nav.classList.toggle('open', !isOpen);
            });

            nav.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    toggle.setAttribute('aria-expanded', 'false');
                    nav.classList.remove('open');
                });
            });
        }());
    </script>
</body>
</html>
