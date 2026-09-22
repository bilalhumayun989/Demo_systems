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
