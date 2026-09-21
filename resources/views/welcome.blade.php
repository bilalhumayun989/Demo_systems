@extends('layouts.software')

@section('title', 'BroshTech — Six Connected Business Software Solutions')
@section('meta_description', 'BroshTech builds purpose-built business software for retail, food, courier, padel clubs and distribution businesses. Six connected solutions, one ecosystem.')


@section('content')
    <!-- Opening Intro Showcase -->
    <div id="intro-splash" class="intro-splash" aria-label="Welcome Showcase">
        <div class="intro-splash-inner">
            <div class="intro-brand">
                <span class="intro-brand-dot"></span>
                <span>BroshTech Software Platform</span>
            </div>

            <h2 class="intro-title">6 Connected Business Solutions. <em class="intro-highlight">One Ecosystem.</em></h2>

            <div class="intro-stage-grid">
                @foreach($products as $slug => $introProduct)
                    <div class="intro-project-card" data-intro-card="{{ $loop->index }}" style="--i: {{ $loop->index }};">
                        @include('software._preview', ['previewProduct' => $introProduct])
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

    <section class="hero">
        <div class="shell hero-intro">
            <div class="hero-copy">
                <div class="hero-kicker"><span></span> BroshTech Software Platform</div>
                <h1>Six solutions built for <em>modern businesses that demand more.</em></h1>
            </div>

            <div class="hero-summary">
                <p>Run your entire business from one connected platform. Sales, inventory, staff, customers, deliveries and finances — six purpose-built systems that work together seamlessly.</p>
                <div class="hero-actions">
                    <a class="button button-primary" href="https://www.broshtech.com/" target="_blank" rel="noopener noreferrer">Visit website</a>
                    <a class="button button-ghost" href="{{ route('software.contact') }}">Talk to our team</a>
                </div>
            </div>
        </div>

        <div class="shell hero-stage project-stage" aria-label="All six live project previews">
            <div class="project-preview-grid">
                <button id="hero-grid-reset" class="hero-grid-reset" type="button" aria-label="Reset grid layout">
                    <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 4v5h5M20 20v-5h-5M4.05 15A9 9 0 1 0 6 6.3"/></svg>
                    <span>Reset view</span>
                </button>
                @foreach($products as $previewProduct)
                    @include('software._preview', ['previewProduct' => $previewProduct])
                @endforeach
            </div>
        </div>
    </section>

    <section class="solutions" id="solutions">
        <div class="shell">
            <div class="section-heading">
                <div><span class="section-kicker">Everything you need</span><h2>More control.<br><em>Less busywork.</em></h2></div>
                <p>Powerful tools that connect your sales, staff, stock and customers so your business can move faster.</p>
            </div>
            <div class="product-grid">
                @foreach($products as $slug => $product)
                    <a class="product-card" href="{{ route('software.show', $slug) }}" aria-label="Explore {{ $product['name'] }}" style="--accent: {{ $product['color'] }}; --soft: {{ $product['soft_color'] }}; --secondary: {{ $product['secondary_color'] }}; --accent-text: {{ $product['accent_text'] }}">
                        <div class="product-icon">@include('software._icon', ['icon' => $product['icon']])</div>
                        <span class="product-number">0{{ $loop->iteration }}</span>
                        <div class="product-card-copy"><small>{{ $product['eyebrow'] }}</small><h3>{{ $product['name'] }}</h3><p>{{ $product['tagline'] }}</p></div>
                        <span class="product-card-action">Explore solution <span aria-hidden="true">↗</span></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="why-us" id="why-us">
        <div class="shell why-grid">
            <div class="why-copy">
                <span class="section-kicker section-kicker-light">One connected platform</span>
                <h2>Everything your business needs to run <em>better.</em></h2>
                <p>BroshTech connects your sales, staff, stock and customers in one practical platform built for the way modern businesses work — six systems, one ecosystem.</p>
                <a class="button button-light" href="{{ route('software.index') }}#solutions">Explore all six solutions <span>↗</span></a>
            </div>
            <div class="why-list">
                <div><span>01</span><h3>Connected operations</h3><p>Six systems that talk to each other — sales, stock, staff, customers, deliveries and finance in one ecosystem.</p></div>
                <div><span>02</span><h3>Less busywork</h3><p>Purpose-built workflows for each industry keep everyday operations clear and easy for your team to follow.</p></div>
                <div><span>03</span><h3>Practical insights</h3><p>Dashboards and reports across every system give you the visibility to make faster, better decisions.</p></div>
            </div>
        </div>
    </section>

    <section class="cta-band">
        <div class="shell cta-inner">
            <div><span class="section-kicker">Ready when you are</span><h2>See how BroshTech can simplify your business.</h2></div>
            <a class="button button-dark" href="{{ route('software.contact') }}">Talk to our team <span>→</span></a>
        </div>
    </section>
@endsection
