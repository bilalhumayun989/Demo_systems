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

            var header = document.getElementById('site-header');
            function updateHeader() {
                header.classList.toggle('scrolled', window.scrollY > 20);
            }
            updateHeader();
            window.addEventListener('scroll', updateHeader, { passive: true });

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

            var projectCards = Array.from(document.querySelectorAll('.project-preview-grid .project-preview'));
            projectCards.forEach(function (card, index) {
                card.classList.add('motion-item', 'motion-3d-card');
                card.style.setProperty('--reveal-delay', String(index * 110) + 'ms');
            });

            var allObserved = Array.from(motionItems).concat(projectCards);
            var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

            if (!('IntersectionObserver' in window) || prefersReducedMotion) {
                allObserved.forEach(function (item) {
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
                }, { threshold: 0.08, rootMargin: '0px 0px -25px' });

                allObserved.forEach(function (item) {
                    observer.observe(item);
                });
            }

            if (!prefersReducedMotion) {
                var heroGrid       = document.querySelector('.project-preview-grid');
                var heroActiveCard = null;
                var heroAbsLayout  = false;
                var heroLocked     = false;
                var heroOrigRects  = [];

                function heroActivateCard(target) {
                    if (heroLocked) { return; }
                    heroLocked = true;

                    var gridRect   = heroGrid.getBoundingClientRect();
                    var containerW = gridRect.width;
                    var containerH;

                    /* First activation: snapshot positions, switch to absolute */
                    if (!heroAbsLayout) {
                        heroAbsLayout = true;
                        containerH = gridRect.height;
                        heroOrigRects = projectCards.map(function (c) {
                            var r = c.getBoundingClientRect();
                            return { top: r.top - gridRect.top, left: r.left - gridRect.left, w: r.width, h: r.height };
                        });

                        heroGrid.style.position = 'relative';
                        heroGrid.style.height   = containerH + 'px';
                        heroGrid.classList.add('has-abs-layout', 'has-active-card');

                        projectCards.forEach(function (card, i) {
                            var r = heroOrigRects[i];
                            card.style.position   = 'absolute';
                            card.style.top        = r.top  + 'px';
                            card.style.left       = r.left + 'px';
                            card.style.width      = r.w    + 'px';
                            card.style.height     = r.h    + 'px';
                            card.style.margin     = '0';
                            card.style.transition = 'none';
                        });
                        heroGrid.getBoundingClientRect(); /* reflow */
                    } else {
                        containerH = parseInt(heroGrid.style.height, 10);
                    }

                    /* Smooth transitions */
                    var ease = 'cubic-bezier(0.16, 1, 0.3, 1)';
                    projectCards.forEach(function (card) {
                        card.style.transition = [
                            'top 0.62s '    + ease,
                            'left 0.62s '   + ease,
                            'width 0.62s '  + ease,
                            'height 0.62s ' + ease,
                            'opacity 0.45s ease',
                            'box-shadow 0.4s ease',
                            'border-color 0.3s ease'
                        ].join(', ');
                    });

                    /* Layout: Row 1 = 1 BIG (left) + 2 SMALL (stacked right); Row 2 = 3 SMALL (side-by-side) */
                    var gap = 16;
                    var row1H = Math.round(containerH * 0.65);
                    var row2H = containerH - row1H - gap;

                    var bigW = Math.round(containerW * 0.67);
                    var small12W = containerW - bigW - gap;
                    var small12H = Math.floor((row1H - gap) / 2);

                    var smalls = projectCards.filter(function (c) { return c !== target; });

                    /* 1 BIG Card (Top Left) */
                    target.style.top     = '0px';
                    target.style.left    = '0px';
                    target.style.width   = bigW + 'px';
                    target.style.height  = row1H + 'px';
                    target.style.zIndex  = '20';
                    target.style.opacity = '1';
                    target.classList.add('is-hero-big');
                    target.classList.remove('is-hero-small');

                    /* 2 Small Cards in Top Right (smalls[0] and smalls[1]) */
                    if (smalls[0]) {
                        smalls[0].style.top     = '0px';
                        smalls[0].style.left    = (bigW + gap) + 'px';
                        smalls[0].style.width   = small12W + 'px';
                        smalls[0].style.height  = small12H + 'px';
                        smalls[0].style.zIndex  = '2';
                        smalls[0].style.opacity = '0.88';
                        smalls[0].classList.add('is-hero-small');
                        smalls[0].classList.remove('is-hero-big');
                    }

                    if (smalls[1]) {
                        smalls[1].style.top     = (small12H + gap) + 'px';
                        smalls[1].style.left    = (bigW + gap) + 'px';
                        smalls[1].style.width   = small12W + 'px';
                        smalls[1].style.height  = small12H + 'px';
                        smalls[1].style.zIndex  = '2';
                        smalls[1].style.opacity = '0.88';
                        smalls[1].classList.add('is-hero-small');
                        smalls[1].classList.remove('is-hero-big');
                    }

                    /* 3 Small Cards in Bottom Row (smalls[2], smalls[3], smalls[4]) */
                    var small345W = Math.floor((containerW - 2 * gap) / 3);
                    var row2Top = row1H + gap;
                    var bottomSmalls = smalls.slice(2);

                    bottomSmalls.forEach(function (card, idx) {
                        var cLeft = idx * (small345W + gap);
                        var cW = (idx === bottomSmalls.length - 1) ? (containerW - cLeft) : small345W;
                        card.style.top     = row2Top + 'px';
                        card.style.left    = cLeft + 'px';
                        card.style.width   = cW + 'px';
                        card.style.height  = row2H + 'px';
                        card.style.zIndex  = '2';
                        card.style.opacity = '0.88';
                        card.classList.add('is-hero-small');
                        card.classList.remove('is-hero-big');
                    });

                    if (heroActiveCard) { heroActiveCard.classList.remove('is-hero-big'); }
                    heroActiveCard = target;

                    setTimeout(function () { heroLocked = false; }, 650);
                }

                function heroReset() {
                    if (!heroAbsLayout || heroLocked) { return; }
                    heroLocked = true;

                    /* Smooth transitions back to original positions */
                    var ease = 'cubic-bezier(0.16, 1, 0.3, 1)';
                    projectCards.forEach(function (card) {
                        card.style.transition = [
                            'top 0.62s '    + ease,
                            'left 0.62s '   + ease,
                            'width 0.62s '  + ease,
                            'height 0.62s ' + ease,
                            'opacity 0.45s ease',
                            'box-shadow 0.4s ease'
                        ].join(', ');
                    });

                    projectCards.forEach(function (card, i) {
                        var r = heroOrigRects[i];
                        card.style.top    = r.top  + 'px';
                        card.style.left   = r.left + 'px';
                        card.style.width  = r.w    + 'px';
                        card.style.height = r.h    + 'px';
                        card.style.zIndex = '';
                        card.style.opacity = '1';
                        card.classList.remove('is-hero-big', 'is-hero-small');
                    });

                    heroGrid.classList.remove('has-active-card');

                    /* After animation, restore flow layout */
                    setTimeout(function () {
                        heroGrid.style.position = '';
                        heroGrid.style.height   = '';
                        heroGrid.classList.remove('has-abs-layout');
                        projectCards.forEach(function (card) {
                            card.style.position   = '';
                            card.style.top        = '';
                            card.style.left       = '';
                            card.style.width      = '';
                            card.style.height     = '';
                            card.style.margin     = '';
                            card.style.transition = '';
                            card.style.zIndex     = '';
                            card.style.opacity    = '';
                        });
                        heroAbsLayout  = false;
                        heroActiveCard = null;
                        heroLocked     = false;
                    }, 680);
                }

                /* Click a card to expand */
                projectCards.forEach(function (card) {
                    card.addEventListener('click', function (e) {
                        if (e.target.closest('a') || e.target.closest('button')) {
                            return;
                        }
                        if (heroLocked) { return; }
                        if (card === heroActiveCard) {
                            heroReset();
                        } else {
                            heroActivateCard(card);
                        }
                    });

                    card.addEventListener('mouseenter', function () {
                        if (heroAbsLayout && card !== heroActiveCard) {
                            card.style.opacity = '1';
                        }
                    });
                    card.addEventListener('mouseleave', function () {
                        if (heroAbsLayout && card !== heroActiveCard) {
                            card.style.opacity = '0.72';
                        }
                    });
                });

                /* Reset button */
                var resetBtn = document.getElementById('hero-grid-reset');
                if (resetBtn) {
                    resetBtn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        heroReset();
                    });
                }

                /* Handle window resize when grid is expanded */
                window.addEventListener('resize', function () {
                    if (heroAbsLayout) {
                        heroReset();
                    }
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
    <script>
        document.querySelectorAll('[data-project-preview]').forEach(function (preview) {
            var viewport = preview.querySelector('.project-preview-viewport');
            var frame = preview.querySelector('iframe');
            var spinner = preview.querySelector('.project-preview-spinner');
            if (!frame) {
                return;
            }
            var url = new URL(frame.dataset.src, window.location.href);

            function resizePreview() {
                frame.style.transform = 'scale(' + viewport.clientWidth / 1280 + ')';
            }

            frame.addEventListener('load', function () {
                if (spinner) {
                    spinner.classList.add('is-loaded');
                }
            });

            setTimeout(function () {
                if (spinner) {
                    spinner.classList.add('is-loaded');
                }
            }, 6000);

            frame.src = url.href;
            frame.hidden = false;
            resizePreview();
            new ResizeObserver(resizePreview).observe(viewport);
        });

        var splash = document.getElementById('intro-splash');
        if (splash) {
            try {
                if (sessionStorage.getItem('has_seen_intro')) {
                    splash.style.display = 'none';
                    document.body.classList.remove('modal-open');
                } else {
                    sessionStorage.setItem('has_seen_intro', 'true');
                    document.body.classList.add('modal-open');

                    var dismissed    = false;
                    var absLayout    = false;
                    var expandLocked = false;
                    var activeCard   = null;
                    var introGrid    = splash.querySelector('.intro-stage-grid');
                    var introCards   = Array.from(splash.querySelectorAll('.intro-project-card'));

                    /* ── dismiss: fade splash + ghost-fly cards into hero positions ── */
                    function dismissSplash() {
                        if (dismissed) { return; }
                        dismissed = true;

                        var heroCards = Array.from(document.querySelectorAll('.project-preview-grid .project-preview'));
                        var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                        document.body.classList.remove('modal-open');
                        splash.classList.add('is-dismissed');

                        if (introCards.length && heroCards.length && !prefersReducedMotion && window.innerWidth > 600) {
                            introCards.forEach(function (card, idx) {
                                var target = heroCards[idx];
                                if (!target) { return; }

                                var fromRect = card.getBoundingClientRect();
                                var toRect   = target.getBoundingClientRect();
                                if (fromRect.width === 0 || toRect.width === 0) { return; }

                                var ghost = card.cloneNode(true);
                                ghost.className = 'intro-flying-ghost';
                                ghost.style.top       = fromRect.top  + 'px';
                                ghost.style.left      = fromRect.left + 'px';
                                ghost.style.width     = fromRect.width  + 'px';
                                ghost.style.height    = fromRect.height + 'px';
                                ghost.style.transform = 'none';
                                ghost.style.opacity   = '1';
                                document.body.appendChild(ghost);

                                var scaleX = toRect.width  / fromRect.width;
                                var scaleY = toRect.height / fromRect.height;
                                var tx = toRect.left - fromRect.left;
                                var ty = toRect.top  - fromRect.top;
                                var delay = idx * 55;

                                ghost.getBoundingClientRect(); /* force reflow */

                                setTimeout(function () {
                                    ghost.style.transform = 'translate(' + tx.toFixed(1) + 'px,' + ty.toFixed(1) + 'px) scale(' + scaleX.toFixed(4) + ',' + scaleY.toFixed(4) + ')';
                                    ghost.style.opacity   = '0';
                                }, delay);

                                setTimeout(function () {
                                    if (ghost.parentNode) { ghost.parentNode.removeChild(ghost); }
                                }, delay + 900);
                            });
                        }

                        setTimeout(function () { splash.style.display = 'none'; }, 650);
                    }

                    /* ── expand a card to fill the left 76%, shrink others to right ── */
                    function activateCard(target) {
                        if (expandLocked || dismissed) { return; }

                        /* Clicking the already-big card dismisses */
                        if (target === activeCard) {
                            clearTimeout(splashTimer);
                            dismissSplash();
                            return;
                        }

                        expandLocked = true;

                        var gridRect   = introGrid.getBoundingClientRect();
                        var containerW = gridRect.width;
                        var containerH = gridRect.height;

                        /* First call: snapshot current positions, switch to absolute layout */
                        if (!absLayout) {
                            absLayout = true;
                            introGrid.style.position = 'relative';
                            introGrid.style.height   = containerH + 'px';
                            introGrid.classList.add('has-abs-layout');

                            introCards.forEach(function (card) {
                                var r = card.getBoundingClientRect();
                                card.style.position   = 'absolute';
                                card.style.top        = (r.top  - gridRect.top)  + 'px';
                                card.style.left       = (r.left - gridRect.left) + 'px';
                                card.style.width      = r.width  + 'px';
                                card.style.height     = r.height + 'px';
                                card.style.margin     = '0';
                                card.style.animation  = 'none';
                                card.style.transition = 'none';
                            });
                            introGrid.getBoundingClientRect(); /* force reflow */
                        }

                        /* Turn on smooth transitions */
                        var easing = 'cubic-bezier(0.16, 1, 0.3, 1)';
                        introCards.forEach(function (card) {
                            card.style.transition = [
                                'top 0.85s '    + easing,
                                'left 0.85s '   + easing,
                                'width 0.85s '  + easing,
                                'height 0.85s ' + easing,
                                'opacity 0.55s ease',
                                'box-shadow 0.5s ease'
                            ].join(', ');
                        });

                        /* Layout: Row 1 = 1 BIG (left) + 2 SMALL (stacked right); Row 2 = 3 SMALL (side-by-side) */
                        var gap = 16;
                        var row1H = Math.round(containerH * 0.65);
                        var row2H = containerH - row1H - gap;

                        var bigW = Math.round(containerW * 0.67);
                        var small12W = containerW - bigW - gap;
                        var small12H = Math.floor((row1H - gap) / 2);

                        var smalls = introCards.filter(function (c) { return c !== target; });

                        /* 1 BIG Card (Top Left) */
                        target.style.top     = '0px';
                        target.style.left    = '0px';
                        target.style.width   = bigW + 'px';
                        target.style.height  = row1H + 'px';
                        target.style.zIndex  = '10';
                        target.style.opacity = '1';
                        target.classList.add('is-big-card');
                        target.classList.remove('is-small-card');

                        /* 2 Small Cards in Top Right (smalls[0] and smalls[1]) */
                        if (smalls[0]) {
                            smalls[0].style.top     = '0px';
                            smalls[0].style.left    = (bigW + gap) + 'px';
                            smalls[0].style.width   = small12W + 'px';
                            smalls[0].style.height  = small12H + 'px';
                            smalls[0].style.zIndex  = '2';
                            smalls[0].style.opacity = '0.88';
                            smalls[0].classList.add('is-small-card');
                            smalls[0].classList.remove('is-big-card');
                        }

                        if (smalls[1]) {
                            smalls[1].style.top     = (small12H + gap) + 'px';
                            smalls[1].style.left    = (bigW + gap) + 'px';
                            smalls[1].style.width   = small12W + 'px';
                            smalls[1].style.height  = small12H + 'px';
                            smalls[1].style.zIndex  = '2';
                            smalls[1].style.opacity = '0.88';
                            smalls[1].classList.add('is-small-card');
                            smalls[1].classList.remove('is-big-card');
                        }

                        /* 3 Small Cards in Bottom Row (smalls[2], smalls[3], smalls[4]) */
                        var small345W = Math.floor((containerW - 2 * gap) / 3);
                        var row2Top = row1H + gap;
                        var bottomSmalls = smalls.slice(2);

                        bottomSmalls.forEach(function (card, idx) {
                            var cLeft = idx * (small345W + gap);
                            var cW = (idx === bottomSmalls.length - 1) ? (containerW - cLeft) : small345W;
                            card.style.top     = row2Top + 'px';
                            card.style.left    = cLeft + 'px';
                            card.style.width   = cW + 'px';
                            card.style.height  = row2H + 'px';
                            card.style.zIndex  = '2';
                            card.style.opacity = '0.88';
                            card.classList.add('is-small-card');
                            card.classList.remove('is-big-card');
                        });

                        if (activeCard) { activeCard.classList.remove('is-big-card'); }
                        activeCard = target;

                        setTimeout(function () { expandLocked = false; }, 650);
                    }

                    /* Click handlers on each intro card */
                    introCards.forEach(function (card) {
                        card.addEventListener('click', function (e) {
                            e.stopPropagation();
                            activateCard(card);
                        });

                        card.addEventListener('mouseenter', function () {
                            if (!dismissed && card !== activeCard) {
                                card.style.opacity = '1';
                            }
                        });
                        card.addEventListener('mouseleave', function () {
                            if (!dismissed && card !== activeCard) {
                                card.style.opacity = '0.72';
                            }
                        });
                    });

                    /* Auto-expand first card once fly-in animations finish (~1.6s) */
                    setTimeout(function () {
                        if (!dismissed && introCards[0]) { activateCard(introCards[0]); }
                    }, 1600);

                    /* Auto-dismiss after showing (7s for slow, clear intro) */
                    var splashTimer = setTimeout(dismissSplash, 7000);

                    /* Skip button */
                    var skipBtn = document.getElementById('intro-skip-btn');
                    if (skipBtn) {
                        skipBtn.addEventListener('click', function (e) {
                            e.stopPropagation();
                            clearTimeout(splashTimer);
                            dismissSplash();
                        });
                    }
                }
            } catch (err) {
                splash.style.display = 'none';
            }
        }
    </script>
</body>
</html>
