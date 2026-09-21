@extends('layouts.software')

@section('title', $product['name'] . ' — ' . $product['eyebrow'])
@section('meta_description', $product['description'])
@section('body_class', 'product-page')

@section('content')
    <section class="product-hero" style="--accent: {{ $product['color'] }}; --soft: {{ $product['soft_color'] }}; --secondary: {{ $product['secondary_color'] }}; --accent-text: {{ $product['accent_text'] }}">
        <div class="shell">
            <a class="back-link" href="{{ route('software.index') }}#solutions"><span>←</span> All solutions</a>
            <div class="product-hero-grid">
                <div class="product-hero-copy">
                    <h1>{{ $product['name'] }} built for <em>{{ $product['hero_focus'] }}</em></h1>
                    <h2>{{ $product['tagline'] }}</h2>
                    <p>{{ $product['description'] }}</p>
                    <div class="product-actions">
                        @if($product['demo_url'])
                            <a class="button button-accent" href="{{ $product['demo_url'] }}" target="_blank" rel="noopener noreferrer">{{ $product['demo_label'] ?? 'Open live demo' }} <span>↗</span></a>
                        @elseif(isset($product['demo_label']))
                            <a class="button button-accent" href="{{ route('software.contact', ['product' => $slug]) }}">{{ $product['demo_label'] }}</a>
                        @else
                            <button class="button button-muted" type="button" disabled title="Demo coming soon">Demo coming soon</button>
                        @endif
                        <a class="button button-outline" href="{{ route('software.contact', ['product' => $slug]) }}">Buy now <span>→</span></a>
                    </div>
                </div>
                <div class="product-showcase">
                    @include('software._preview', ['previewProduct' => $product, 'hideFooter' => true])
                </div>
            </div>
        </div>
    </section>

    <section class="feature-section">
        <div class="shell">
            <div class="feature-intro"><span class="section-kicker">Everything you need</span><h2>{{ $product['feature_heading'] ?? 'More control.' }}<br><em>{{ $product['feature_focus'] ?? 'Less busywork.' }}</em></h2><p>{{ $product['feature_intro'] ?? 'Core tools designed to keep your team aligned and your operation moving.' }}</p></div>
            <div class="feature-grid">
                @foreach($product['features'] as $feature)
                    <article><span class="feature-check">✓</span><h3>{{ $feature['title'] }}</h3><p>{{ $feature['description'] }}</p></article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="product-cta" style="--accent: {{ $product['color'] }}; --secondary: {{ $product['secondary_color'] }}; --accent-text: {{ $product['accent_text'] }}">
        <div class="shell">
            <div><span>{{ $product['cta_intro'] ?? 'Bring better operations within reach.' }}</span><h2>{{ $product['cta_heading'] ?? 'Ready to get started with ' . $product['name'] . '?' }}</h2></div>
            <div class="product-cta-actions">
                @if($product['demo_url'])<a class="button button-white-outline" href="{{ $product['demo_url'] }}" target="_blank" rel="noopener noreferrer">Try the demo <span>↗</span></a>@endif
                <a class="button button-white" href="{{ route('software.contact', ['product' => $slug]) }}">Contact sales <span>→</span></a>
            </div>
        </div>
    </section>

    <section class="more-products">
        <div class="shell">
            <div class="more-heading"><div><span class="section-kicker">Keep exploring</span><h2>More from BroshTech</h2></div><a href="{{ route('software.index') }}#solutions">View all six <span>→</span></a></div>
            <div class="more-grid">
                @foreach(collect($products)->except($slug)->take(3) as $otherSlug => $other)
                    <a class="more-card" href="{{ route('software.show', $otherSlug) }}" style="--accent: {{ $other['color'] }}; --soft: {{ $other['soft_color'] }}; --secondary: {{ $other['secondary_color'] }}; --accent-text: {{ $other['accent_text'] }}"><span class="product-icon">@include('software._icon', ['icon' => $other['icon']])</span><span><small>{{ $other['eyebrow'] }}</small><strong>{{ $other['name'] }}</strong></span><b>↗</b></a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
