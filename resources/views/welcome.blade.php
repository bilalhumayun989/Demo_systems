@extends('layouts.software')

@section('title', 'Vendify — Business management for modern retail')
@section('meta_description', 'Vendify is a flexible POS and business management platform for shops, salons and service-based businesses.')

@section('content')
    <section class="hero">
        <div class="shell hero-intro">
            <div class="hero-copy">
                <div class="hero-kicker"><span></span> Vendify by BroshTech</div>
                <h1>Built for <em>modern retail and service businesses.</em></h1>
            </div>

            <div class="hero-summary">
                <p>Run your entire business from one connected workspace. Manage sales, customers, inventory, employees, appointments and daily operations without switching between multiple systems.</p>
                <div class="hero-actions">
                    <a class="button button-primary" href="https://www.broshtech.com/" target="_blank" rel="noopener noreferrer">Visit website</a>
                    <a class="button button-ghost" href="{{ route('software.contact', ['product' => 'vendify']) }}">Talk to our team</a>
                </div>
            </div>
        </div>

        <div class="shell hero-stage project-stage" aria-label="All six live project previews">
            <div class="project-preview-grid">
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
                <span class="section-kicker section-kicker-light">One connected workspace</span>
                <h2>Everything your business needs to run <em>better.</em></h2>
                <p>Vendify connects your sales, staff, stock and customers in one practical workspace built for the way modern retail and service businesses work.</p>
                <a class="button button-light" href="https://pos.broshtech.com/demo" target="_blank" rel="noopener noreferrer">See Vendify in action <span>↗</span></a>
            </div>
            <div class="why-list">
                <div><span>01</span><h3>Connected operations</h3><p>Bring sales, inventory, staff and customers together in one workspace.</p></div>
                <div><span>02</span><h3>Less busywork</h3><p>Keep everyday workflows clear, organized and easy for your team to follow.</p></div>
                <div><span>03</span><h3>Practical insights</h3><p>Use reports and dashboards to understand performance and make better decisions.</p></div>
            </div>
        </div>
    </section>

    <section class="cta-band">
        <div class="shell cta-inner">
            <div><span class="section-kicker">Ready when you are</span><h2>See how Vendify can simplify your business.</h2></div>
            <a class="button button-dark" href="https://pos.broshtech.com/demo" target="_blank" rel="noopener noreferrer">Open the demo <span>↗</span></a>
        </div>
    </section>
@endsection
