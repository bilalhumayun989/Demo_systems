@extends('layouts.software')

@section('title', 'BroshTech — Software built for real business')
@section('meta_description', 'Explore six purpose-built management systems for retail, salons, couriers, distribution, restaurants and paddle clubs.')

@section('content')
    <section class="hero">
        <div class="shell hero-intro">
            <div class="hero-copy">
                <div class="hero-kicker"><span></span> BroshTech software suite</div>
                <h1>Management software built for <em>real business.</em></h1>
            </div>

            <div class="hero-summary">
                <p>Six focused systems for retail, salons, couriers, distribution, restaurants and paddle clubs&mdash;built to make daily work simpler.</p>
                <div class="hero-actions">
                    <a class="button button-primary" href="#solutions">Explore software <span>&darr;</span></a>
                    <a class="button button-ghost" href="{{ route('software.contact') }}">Talk to our team <span>&nearr;</span></a>
                </div>
            </div>
        </div>

        <div class="shell hero-stage" aria-label="Business software dashboard preview">
            <div class="hero-visual">
                <div class="dashboard-image-card">
                    <img src="{{ asset('images/software_dashboard.jpeg') }}" alt="BroshTech software dashboard" loading="eager">
                </div>
            </div>
        </div>
    </section>

    <section class="solutions" id="solutions">
        <div class="shell">
            <div class="section-heading">
                <div><span class="section-kicker">Our software suite</span><h2>One challenge.<br><em>One focused solution.</em></h2></div>
                <p>Purpose-built tools that fit your industry—without the bloat, complexity or steep learning curve.</p>
            </div>
            <div class="product-grid">
                @foreach($products as $slug => $product)
                    <article class="product-card" style="--accent: {{ $product['color'] }}; --soft: {{ $product['soft_color'] }}; --secondary: {{ $product['secondary_color'] }}; --accent-text: {{ $product['accent_text'] }}">
                        <div class="product-icon">@include('software._icon', ['icon' => $product['icon']])</div>
                        <span class="product-number">0{{ $loop->iteration }}</span>
                        <div class="product-card-copy"><small>{{ $product['eyebrow'] }}</small><h3>{{ $product['name'] }}</h3><p>{{ $product['tagline'] }}</p></div>
                        <a href="{{ route('software.show', $slug) }}" aria-label="Explore {{ $product['name'] }}">Explore solution <span>↗</span></a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="why-us" id="why-us">
        <div class="shell why-grid">
            <div class="why-copy">
                <span class="section-kicker section-kicker-light">Why BroshTech</span>
                <h2>Technology should make business feel <em>simpler.</em></h2>
                <p>We begin with the daily realities of your operation, then build software around them. The result is technology your team can understand, adopt and depend on.</p>
                <a class="button button-light" href="{{ route('software.contact') }}">Start a conversation <span>→</span></a>
            </div>
            <div class="why-list">
                <div><span>01</span><h3>Built for your industry</h3><p>Workflows and features shaped around real operational needs.</p></div>
                <div><span>02</span><h3>Ready to scale</h3><p>Solid foundations that grow alongside your team and locations.</p></div>
                <div><span>03</span><h3>Support that listens</h3><p>Helpful people who understand both the product and your business.</p></div>
            </div>
        </div>
    </section>

    <section class="cta-band">
        <div class="shell cta-inner">
            <div><span class="section-kicker">Ready when you are</span><h2>Let’s build a better way to work.</h2></div>
            <a class="button button-dark" href="{{ route('software.contact') }}">Talk to sales <span>→</span></a>
        </div>
    </section>
@endsection
