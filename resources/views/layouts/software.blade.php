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
                                <a href="https://www.facebook.com/p/BroshTech-61569795868977/" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on Facebook">f</a>
                                <a href="https://pk.linkedin.com/company/broshtech" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on LinkedIn">in</a>
                                <a href="https://www.instagram.com/broshtech/" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on Instagram">ig</a>
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
            <img src="https://www.broshtech.com/fotterfotter.webp" alt="" loading="lazy">
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
