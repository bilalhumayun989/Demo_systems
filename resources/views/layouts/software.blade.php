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
                                    <svg viewBox="0 0 448 512" aria-hidden="true"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80A48 48 0 0 0 400 32Z"/></svg>
                                </a>
                                <a href="https://pk.linkedin.com/company/broshtech" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on LinkedIn">
                                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V8.98h3.42v1.57h.05c.47-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.29ZM5.32 7.41a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12Zm1.78 13.04H3.54V8.98H7.1v11.47ZM22.23 0H1.77C.79 0 0 .77 0 1.73v20.54C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.73V1.73C24 .77 23.21 0 22.23 0Z"/></svg>
                                </a>
                                <a href="https://www.instagram.com/broshtech/" target="_blank" rel="noopener noreferrer" aria-label="BroshTech on Instagram">
                                    <svg viewBox="0 0 448 512" aria-hidden="true"><path d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0-59.3-88.7Zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12-18.1-7.1-57.6-6.8-83.1-6.5-4.1 0-7.9.1-11.2.1-3.3 0-7.2 0-11.4-.1-25.5-.3-64.8-.7-82.9 6.5-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2 0 4.1.1 7.9.1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2 2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5 4.1 0 7.9-.1 11.2-.1 3.3 0 7.2 0 11.4.1 25.5.3 64.8.7 82.9-6.5 6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83 0-4.2-.1-8.1-.1-11.4s0-7.1.1-11.4c.3-25.5.7-64.9-6.5-83-2.7-6.9-6.8-13.1-12-18.4Zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4Zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1 2.6-7.1 5.2-9.8 6.1-4.5 9.8-5.2 7.6-.4 11.1 1.1 6.5 3.9 8.6 7 3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2-3.9 3.2-6.2 4.2-4.8 1.5-7.3 1.5c-3.8 0-7.5-1.1-10.6-3.2ZM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96v320c0 35.3 28.7 64 64 64h320c35.3 0 64-28.7 64-64V96Zm-91 293c-18.7 18.7-41.4 24.6-67 25.9-26.4 1.5-105.6 1.5-132 0-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132 1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0 25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9-1.3 25.6-7.1 48.3-25.8 67Z"/></svg>
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
                '.section-heading .section-kicker',
                '.section-heading h2',
                '.section-heading > p',
                '.why-copy .section-kicker',
                '.why-copy > p',
                '.feature-intro .section-kicker',
                '.feature-intro h2',
                '.feature-intro > p',
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

                if (item.matches('.section-heading h2, .feature-intro h2, .contact-page-heading h1, .cta-band h2, .product-cta h2')) {
                    item.classList.add('motion-mask');
                } else {
                    item.classList.add('motion-soft');
                }
            });

            var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            if (!('IntersectionObserver' in window) || prefersReducedMotion) {
                motionItems.forEach(function (item) {
                    item.classList.add('is-visible');
                });
            } else {
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
            }

            var scrollText = document.querySelector('.why-copy h2');
            var scrollMedia = Array.from(document.querySelectorAll('.hero-stage, .product-showcase')).map(function (container) {
                return {
                    container: container,
                    image: container.querySelector('.dashboard-image-card img, .showcase-image-wrap img'),
                    maximumScale: container.classList.contains('hero-stage') ? 0.05 : 0.04
                };
            }).filter(function (media) {
                return media.image;
            });
            var scrollWords = [];
            var frameRequested = false;

            function wrapWords(element) {
                Array.from(element.childNodes).forEach(function (node) {
                    if (node.nodeType === Node.TEXT_NODE) {
                        var fragment = document.createDocumentFragment();

                        node.textContent.split(/(\s+)/).forEach(function (part) {
                            if (/^\s+$/.test(part) || part === '') {
                                fragment.appendChild(document.createTextNode(part));
                            } else {
                                var word = document.createElement('span');
                                word.className = 'scroll-word';
                                word.textContent = part;
                                fragment.appendChild(word);
                            }
                        });

                        node.replaceWith(fragment);
                    } else if (node.nodeType === Node.ELEMENT_NODE) {
                        wrapWords(node);
                    }
                });
            }

            if (scrollText) {
                wrapWords(scrollText);
                scrollWords = Array.from(scrollText.querySelectorAll('.scroll-word'));
            }

            function updateScrollEffects() {
                frameRequested = false;

                if (scrollText && scrollWords.length) {
                    var textRect = scrollText.getBoundingClientRect();
                    var textStart = window.innerHeight * 0.82;
                    var textDistance = Math.max(window.innerHeight * 0.48, textRect.height);
                    var textProgress = Math.min(1, Math.max(0, (textStart - textRect.top) / textDistance));
                    var activeWords = Math.ceil(textProgress * scrollWords.length);

                    scrollWords.forEach(function (word, index) {
                        word.classList.toggle('is-active', prefersReducedMotion || index < activeWords);
                    });
                }

                scrollMedia.forEach(function (media) {
                    var mediaRect = media.container.getBoundingClientRect();
                    var mediaProgress = Math.min(1, Math.max(0, (window.innerHeight - mediaRect.top) / (window.innerHeight + mediaRect.height)));
                    var mediaScale = prefersReducedMotion ? 1 : 1 + (mediaProgress * media.maximumScale);
                    var mediaOffset = prefersReducedMotion ? 0 : mediaProgress * -6;

                    media.image.style.transform = 'translateY(' + mediaOffset.toFixed(2) + 'px) scale(' + mediaScale.toFixed(4) + ')';
                });
            }

            function requestScrollUpdate() {
                if (!frameRequested) {
                    frameRequested = true;
                    window.requestAnimationFrame(updateScrollEffects);
                }
            }

            updateScrollEffects();
            window.addEventListener('scroll', requestScrollUpdate, { passive: true });
            window.addEventListener('resize', requestScrollUpdate);
        }());
    </script>
</body>
</html>
