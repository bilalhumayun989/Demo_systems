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
<body id="top" class="@yield('body_class')">
    <header class="site-header" id="site-header">
        <div class="shell nav-wrap">
            <a class="brand" href="{{ route('software.index') }}" aria-label="BroshTech software home">
                <span class="brand-mark" aria-hidden="true">
                    <img src="{{ asset('images/brosh_tech_logo.png') }}" alt="">
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
        <div class="shell footer-shell">
            <div class="footer-panel">
                <div class="footer-main-grid">
                    <div class="footer-project">
                        <h2><span>Have a project?</span>Let&rsquo;s start.</h2>
                        <div class="footer-rule"></div>
                        <form class="footer-email" action="{{ route('software.contact') }}" method="get">
                            <label class="sr-only" for="footer-email">Your email address</label>
                            <input id="footer-email" name="email" type="email" placeholder="Enter your email...">
                            <button type="submit" aria-label="Contact BroshTech"><span aria-hidden="true">&nearr;</span></button>
                        </form>
                    </div>

                    <div class="footer-nav-grid">
                        <div class="footer-nav-column">
                            <h3>Explore</h3>
                            <a href="{{ route('software.index') }}">Home</a>
                            <a href="{{ route('software.index') }}#solutions">Software</a>
                            <a href="{{ route('software.index') }}#why-us">Why us</a>
                            <a href="{{ route('software.contact') }}">Contact us</a>
                        </div>

                        <div class="footer-nav-column footer-product-column">
                            <h3>Products</h3>
                            @foreach(config('software.products') as $footerSlug => $footerProduct)
                                <a href="{{ route('software.show', $footerSlug) }}">{{ $footerProduct['name'] }}</a>
                            @endforeach
                        </div>

                        <div class="footer-nav-column">
                            <h3>Quick links</h3>
                            <div class="footer-socials">
                                <a href="https://www.facebook.com/p/BroshTech-61569795868977/" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on Facebook">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.03 1.79-4.7 4.53-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.26h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07Z"/></svg>
                                </a>
                                <a href="https://pk.linkedin.com/company/broshtech" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on LinkedIn">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V8.98h3.42v1.57h.05c.47-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.29ZM5.32 7.41a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12Zm1.78 13.04H3.54V8.98H7.1v11.47ZM22.23 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.73V1.73C24 .77 23.21 0 22.23 0Z"/></svg>
                                </a>
                                <a href="https://www.instagram.com/broshtech/" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on Instagram">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07s-3.58-.01-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.65-.07-4.85s.01-3.58.07-4.85C2.38 3.92 3.9 2.38 7.15 2.23 8.42 2.17 8.8 2.16 12 2.16ZM12 0C8.74 0 8.33.01 7.05.07 2.7.27.27 2.69.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.2 4.36 2.63 6.78 6.98 6.98C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c4.35-.2 6.78-2.62 6.98-6.98.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95C23.73 2.69 21.3.27 16.95.07 15.67.01 15.26 0 12 0Zm0 5.84A6.16 6.16 0 1 0 12 18.16 6.16 6.16 0 0 0 12 5.84Zm0 10.16a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm6.41-11.84a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88Z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-details">
                    <div>
                        <h3>Give us a call</h3>
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', config('software.sales_phone')) }}?text={{ urlencode('Hello BroshTech, I am interested in your software solutions.') }}" target="_blank" rel="noopener noreferrer">{{ config('software.sales_phone') }}</a>
                        <a class="footer-mail-link" href="mailto:{{ config('software.sales_email') }}">{{ config('software.sales_email') }}</a>
                    </div>
                    <div class="footer-location">
                        <h3>Our location</h3>
                        <a href="https://www.google.com/maps/search/?api=1&amp;query=113+Mall+Faisalabad" target="_blank" rel="noopener noreferrer">113 Mall, Faisalabad</a>
                    </div>
                </div>

                <div class="footer-bottom">
                    <span>&copy; {{ date('Y') }} BroshTech. All rights reserved.</span>
                    <a href="#top">Back To Top <span aria-hidden="true">&uarr;</span></a>
                </div>
            </div>
        </div>

        <div class="footer-art" aria-hidden="true">
            <img src="{{ asset('images/broshtech-footer.webp') }}" alt="" loading="lazy">
        </div>
    </footer>

    <script>
        (function () {
            var toggle = document.querySelector('.nav-toggle');
            var nav = document.getElementById('site-nav');

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

            var motionItems = document.querySelectorAll([
                '.hero-kicker',
                '.hero-copy h1',
                '.hero-summary p',
                '.section-heading .section-kicker',
                '.section-heading h2',
                '.section-heading > p',
                '.why-copy .section-kicker',
                '.why-copy h2',
                '.why-copy > p',
                '.feature-intro .section-kicker',
                '.feature-intro h2',
                '.feature-intro > p',
                '.product-title-row > span',
                '.product-hero-copy h1',
                '.product-hero-copy h2',
                '.product-hero-copy > p',
                '.contact-page-heading .section-kicker',
                '.contact-page-heading h1',
                '.contact-page-heading > p',
                '.cta-band .section-kicker',
                '.cta-band h2',
                '.product-cta > .shell > div:first-child > span',
                '.product-cta h2'
            ].join(','));

            motionItems.forEach(function (item, index) {
                item.classList.add('motion-item');
                item.style.setProperty('--reveal-delay', String((index % 3) * 80) + 'ms');

                if (item.matches('.hero-copy h1, .product-hero-copy h1, .section-heading h2, .feature-intro h2, .contact-page-heading h1, .cta-band h2, .product-cta h2')) {
                    item.classList.add('motion-mask');
                } else {
                    item.classList.add('motion-soft');
                }
            });

            if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                motionItems.forEach(function (item) {
                    item.classList.add('is-visible');
                });

                return;
            }

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -35px' });

            motionItems.forEach(function (item) {
                observer.observe(item);
            });
        }());
    </script>
</body>
</html>
