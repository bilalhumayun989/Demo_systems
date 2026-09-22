<!-- Opening Intro Showcase -->
<div id="intro-splash" class="intro-splash" aria-label="Welcome Showcase">
    <div class="intro-splash-inner">
        <div class="intro-brand">
            <span class="intro-brand-dot"></span>
            <span>BroshTech Software Platform</span>
        </div>

        <h1 class="intro-title">How to Take Live Demo: <em class="intro-highlight">Click Any Software Card Below to See Demo</em></h1>

        <!-- Real-Time JS Guided Demo Cursor -->
        <div id="intro-tour-cursor" class="intro-tour-cursor" aria-hidden="true">
            <svg class="tour-pointer-svg" viewBox="0 0 24 24" width="24" height="24" fill="#111111" stroke="#ffffff" stroke-width="1.8">
                <path d="M13.64 21.97a1 1 0 0 1-.94-.66l-2.48-6.44-4.52 3.16a1 1 0 0 1-1.57-.83V3.4a1 1 0 0 1 1.63-.78l13 10.5a1 1 0 0 1-.57 1.76l-5.3.38 2.5 6.27a1 1 0 0 1-.55 1.3l-1.12.44a.9.9 0 0 1-.57.7Z"/>
            </svg>
            <div class="tour-tap-ripple"></div>
            <span class="tour-guidance-badge">Click card &rarr; becomes BIG!</span>
        </div>

        <div class="intro-stage-grid">
            @foreach($products as $slug => $introProduct)
                <div class="intro-project-card" data-intro-card="{{ $loop->index }}" style="--i: {{ $loop->index }};">
                    <div class="project-preview">
                        <div class="project-preview-viewport static-preview-viewport" style="position: relative; overflow: hidden; aspect-ratio: 16/9; background: #f2f2ef;">
                            <img src="{{ asset('images/Screenshot_' . ($loop->index + 1) . '.png') }}" alt="{{ $introProduct['name'] }} Real Preview" style="width: 100%; height: 100%; object-fit: cover; object-position: top center; display: block;" />
                            <div class="intro-card-click-badge">
                                <svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M13.64 21.97a1 1 0 0 1-.94-.66l-2.48-6.44-4.52 3.16a1 1 0 0 1-1.57-.83V3.4a1 1 0 0 1 1.63-.78l13 10.5a1 1 0 0 1-.57 1.76l-5.3.38 2.5 6.27a1 1 0 0 1-.55 1.3l-1.12.44a.9.9 0 0 1-.57.7Z"/></svg>
                                <span>Click for Demo</span>
                            </div>
                        </div>
                        <div class="project-preview-footer">
                            <strong>{{ $introProduct['name'] }}</strong>
                            <span class="intro-card-action">Take Demo &rarr;</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="intro-footer-wrap">
            <div class="intro-progress-bar">
                <div class="intro-progress-fill"></div>
            </div>
            <button id="intro-skip-btn" type="button" class="intro-skip-button">
                <span>Explore Platform</span>
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>
</div>

<script>
    (function () {
        var splash = document.getElementById('intro-splash');
        if (!splash) { return; }

        try {
            var navEntry = (window.performance && performance.getEntriesByType) ? performance.getEntriesByType('navigation')[0] : null;
            var isReload = navEntry ? (navEntry.type === 'reload') : (window.performance && window.performance.navigation && window.performance.navigation.type === 1);
            var isBackForward = navEntry ? (navEntry.type === 'back_forward') : (window.performance && window.performance.navigation && window.performance.navigation.type === 2);
            var isRouteNav = sessionStorage.getItem('is_route_change') === 'true';

            /* Clear route change flag for current turn */
            sessionStorage.removeItem('is_route_change');

            /* Listen for internal link clicks so subsequent route navigation skips intro */
            document.addEventListener('click', function (e) {
                var link = e.target.closest('a[href]');
                if (link) {
                    var href = link.getAttribute('href');
                    if (href && !href.startsWith('#') && !href.startsWith('javascript:')) {
                        sessionStorage.setItem('is_route_change', 'true');
                    }
                }
            }, true);

            /* Skip intro on internal route changes / back-forward, BUT ALWAYS show intro on hard refresh / reload */
            if ((isRouteNav || isBackForward) && !isReload) {
                splash.style.display = 'none';
                document.body.classList.remove('modal-open');
                document.querySelectorAll('.project-preview-grid .project-preview').forEach(function (card) {
                    card.classList.add('is-visible');
                    card.style.opacity = '1';
                });
                return;
            }

            document.body.classList.add('modal-open');

            var dismissed    = false;
            var absLayout    = false;
            var activeCard   = null;
            var introGrid    = splash.querySelector('.intro-stage-grid');
            var introCards   = Array.from(splash.querySelectorAll('.intro-project-card'));
            var tourCursor   = splash.querySelector('#intro-tour-cursor');
            var tourBadge    = tourCursor ? tourCursor.querySelector('.tour-guidance-badge') : null;
            var tourRipple   = tourCursor ? tourCursor.querySelector('.tour-tap-ripple') : null;
            var tourTimers   = [];

            function clearAllTimers() {
                tourTimers.forEach(clearTimeout);
                tourTimers = [];
            }

            /* ── dismiss: fade splash + ghost-fly cards into hero positions ── */
            function dismissSplash() {
                if (dismissed) { return; }
                dismissed = true;
                clearAllTimers();

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

            /* ── expand a card to fill the left 67%, shrink others to right/bottom ── */
            function activateCard(target) {
                if (dismissed) { return; }

                /* If same card clicked again, do nothing (don't dismiss) */
                if (target === activeCard) { return; }

                var gridRect   = introGrid.getBoundingClientRect();
                var containerW = gridRect.width;
                var containerH = Math.round(gridRect.height);

                /* First call: snapshot current positions, switch to absolute layout */
                if (!absLayout) {
                    absLayout = true;

                    introCards.forEach(function (card) {
                        card.style.animation = 'none';
                        card.style.opacity   = '1';
                        card.style.transform = 'none';
                    });

                    var freshGridRect = introGrid.getBoundingClientRect();
                    containerW = freshGridRect.width;
                    containerH = Math.round(freshGridRect.height);

                    introGrid.style.position = 'relative';
                    introGrid.style.height   = containerH + 'px';
                    introGrid.classList.add('has-abs-layout');

                    introCards.forEach(function (card) {
                        var r = card.getBoundingClientRect();
                        card.style.position   = 'absolute';
                        card.style.top        = (r.top  - freshGridRect.top)  + 'px';
                        card.style.left       = (r.left - freshGridRect.left) + 'px';
                        card.style.width      = r.width  + 'px';
                        card.style.height     = r.height + 'px';
                        card.style.margin     = '0';
                        card.style.transition = 'none';
                    });
                    introGrid.getBoundingClientRect(); /* force reflow */
                } else {
                    containerH = parseInt(introGrid.style.height, 10);
                }

                /* Turn on ultra-smooth transitions for card expansion */
                var easing = 'cubic-bezier(0.16, 1, 0.3, 1)';
                introCards.forEach(function (card) {
                    card.style.transition = [
                        'top 1.4s '     + easing,
                        'left 1.4s '    + easing,
                        'width 1.4s '   + easing,
                        'height 1.4s '  + easing,
                        'opacity 0.9s ease',
                        'box-shadow 0.8s ease'
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

                if (activeCard && activeCard !== target) {
                    activeCard.classList.remove('is-big-card');
                }
                activeCard = target;
            }

            /* Real-Time Guided Cursor Movement Function */
            function moveCursorTo(targetElem, textLabel, tapClick, onComplete) {
                if (!tourCursor || !targetElem) { return; }
                var splashInner = splash.querySelector('.intro-splash-inner');
                var innerRect   = splashInner.getBoundingClientRect();
                var elemRect    = targetElem.getBoundingClientRect();

                var destX = (elemRect.left - innerRect.left) + (elemRect.width / 2);
                var destY = (elemRect.top - innerRect.top) + (elemRect.height / 2);

                tourCursor.style.transform = 'translate(' + Math.round(destX) + 'px, ' + Math.round(destY) + 'px)';
                tourCursor.style.opacity   = '1';

                if (textLabel && tourBadge) {
                    tourBadge.textContent = textLabel;
                }

                if (tapClick) {
                    var t1 = setTimeout(function () {
                        tourCursor.classList.add('is-clicking');
                        if (tourRipple) {
                            tourRipple.classList.remove('is-animating');
                            void tourRipple.offsetWidth; /* reflow */
                            tourRipple.classList.add('is-animating');
                        }
                    }, 1100);

                    var t2 = setTimeout(function () {
                        tourCursor.classList.remove('is-clicking');
                        if (typeof onComplete === 'function') { onComplete(); }
                    }, 1450);

                    tourTimers.push(t1, t2);
                }
            }

            /* Run guided tour demo sequence */
            if (tourCursor && introCards.length >= 3 && window.innerWidth > 600) {
                var mainTitle = splash.querySelector('.intro-title');

                /* Step 1 (t = 1000ms): Show cursor near top headline */
                tourTimers.push(setTimeout(function () {
                    if (mainTitle) {
                        moveCursorTo(mainTitle, 'Click any card to expand BIG', false);
                    }
                }, 1000));

                /* Step 2 (t = 3000ms): Glide to Card 1 & tap -> Card 1 morphs BIG! */
                tourTimers.push(setTimeout(function () {
                    moveCursorTo(introCards[0], 'Clicking Card 1...', true, function () {
                        if (dismissed) { return; }
                        activateCard(introCards[0]);
                        if (tourBadge) { tourBadge.textContent = 'Card 1 is now BIG'; }
                    });
                }, 3000));

                /* Step 3 (t = 8000ms): Glide to Card 2 & tap -> Card 2 morphs BIG! */
                tourTimers.push(setTimeout(function () {
                    moveCursorTo(introCards[1], 'Switching to Card 2...', true, function () {
                        if (dismissed) { return; }
                        activateCard(introCards[1]);
                        if (tourBadge) { tourBadge.textContent = 'Card 2 is now BIG'; }
                    });
                }, 8000));

                /* Step 4 (t = 13500ms): Glide to Card 3 & tap -> Card 3 morphs BIG! */
                tourTimers.push(setTimeout(function () {
                    moveCursorTo(introCards[2], 'Switching to Card 3...', true, function () {
                        if (dismissed) { return; }
                        activateCard(introCards[2]);
                        if (tourBadge) { tourBadge.textContent = 'Card 3 is now BIG'; }
                    });
                }, 13500));

                /* Step 5 (t = 19000ms): Glide to skip button */
                tourTimers.push(setTimeout(function () {
                    var skipBtn = splash.querySelector('#intro-skip-btn');
                    if (skipBtn) {
                        moveCursorTo(skipBtn, 'Click to Explore Platform', false);
                    }
                }, 19000));
            }

            /* Manual Click Handlers on each intro card */
            introCards.forEach(function (card, index) {
                card.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (dismissed) { return; }

                    /* Stop automated tour when user interacts manually */
                    clearAllTimers();

                    /* Move cursor to clicked card with tap animation */
                    moveCursorTo(card, 'Card ' + (index + 1) + ' Selected', true, function () {
                        if (tourBadge) { tourBadge.textContent = 'Card ' + (index + 1) + ' is BIG'; }
                    });

                    activateCard(card);
                });

                card.addEventListener('mouseenter', function () {
                    if (!dismissed && card !== activeCard) {
                        card.style.opacity = '1';
                    }
                });
                card.addEventListener('mouseleave', function () {
                    if (!dismissed && card !== activeCard) {
                        card.style.opacity = '0.88';
                    }
                });
            });

            /* Auto-dismiss timer after full showcase (22s) */
            var splashTimer = setTimeout(dismissSplash, 22000);

            /* Skip button */
            var skipBtn = document.getElementById('intro-skip-btn');
            if (skipBtn) {
                skipBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    clearTimeout(splashTimer);
                    clearAllTimers();
                    dismissSplash();
                });
            }
        } catch (err) {
            splash.style.display = 'none';
        }
    }());
</script>
