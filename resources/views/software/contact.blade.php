@extends('layouts.software')

@php
    $interest = $product ? $product['name'] : 'BroshTech software solutions';
    $emailSubject = urlencode('I am interested in '.$interest);
    $whatsappMessage = urlencode('Hello BroshTech, I am interested in '.$interest.'. Please share pricing and setup details.');
    $whatsappNumber = preg_replace('/\D+/', '', config('software.sales_phone'));
@endphp

@section('title', 'Contact Sales — BroshTech')
@section('meta_description', 'Contact BroshTech by email or WhatsApp for software pricing and setup information.')
@section('body_class', 'contact-page')

@section('content')
    <section class="contact-page-section">
        <div class="shell contact-page-shell">
            <a class="back-link" href="{{ $slug ? route('software.show', $slug) : route('software.index') }}">
                <span aria-hidden="true">←</span> {{ $product ? 'Back to '.$product['name'] : 'Back to home' }}
            </a>

            <div class="contact-page-heading">
                <span class="section-kicker">Talk to our team</span>
                <h1>Let’s discuss<br><em>{{ $product ? $product['name'] : 'your business' }}.</em></h1>
                <p>Choose the contact method that works best for you. We’ll help with pricing, setup and any questions about the system.</p>
            </div>

            <div class="contact-page-grid">
                <a class="contact-page-card" href="mailto:{{ config('software.sales_email') }}?subject={{ $emailSubject }}">
                    <span class="contact-page-icon" aria-hidden="true">@</span>
                    <span class="contact-page-card-copy">
                        <small>Email</small>
                        <strong>{{ config('software.sales_email') }}</strong>
                        <span>Send us your requirements and we’ll reply with the right information.</span>
                    </span>
                    <b aria-hidden="true">→</b>
                </a>

                <a class="contact-page-card" href="https://wa.me/{{ $whatsappNumber }}?text={{ $whatsappMessage }}" target="_blank" rel="noopener noreferrer">
                    <span class="contact-page-icon contact-page-wa" aria-hidden="true">WA</span>
                    <span class="contact-page-card-copy">
                        <small>WhatsApp</small>
                        <strong>{{ config('software.sales_phone') }}</strong>
                        <span>Start a WhatsApp conversation with a prepared message.</span>
                    </span>
                    <b aria-hidden="true">↗</b>
                </a>
            </div>

            <div class="contact-page-note">
                <span aria-hidden="true">✓</span>
                <p><strong>Direct support from our team</strong>We’ll understand your needs and guide you through the next steps.</p>
            </div>
        </div>
    </section>
@endsection
