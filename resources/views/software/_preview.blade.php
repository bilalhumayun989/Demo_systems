<div class="project-preview" data-project-preview data-preview-card>
    <div class="project-preview-viewport">
        @if($previewProduct['embed_enabled'] ?? true)
            <div class="project-preview-spinner" aria-label="Loading live preview">
                <span class="spinner-ring"></span>
            </div>
            <iframe data-src="{{ $previewProduct['demo_url'] }}" title="{{ $previewProduct['name'] }} live project preview" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-popups-to-escape-sandbox" hidden></iframe>
        @else
            <div class="project-preview-unavailable" aria-label="{{ $previewProduct['name'] }} project overview">
                <span class="preview-category">{{ $previewProduct['eyebrow'] }}</span>
                <strong>{{ $previewProduct['name'] }}</strong>
                <p>{{ $previewProduct['tagline'] }}</p>
                <a href="{{ $previewProduct['demo_url'] }}" target="_blank" rel="noopener noreferrer">Launch demo in a new tab <span aria-hidden="true">↗</span></a>
            </div>
        @endif
        <div class="intro-card-click-badge">
            <svg viewBox="0 0 24 24" width="13" height="13" fill="currentColor"><path d="M13.64 21.97a1 1 0 0 1-.94-.66l-2.48-6.44-4.52 3.16a1 1 0 0 1-1.57-.83V3.4a1 1 0 0 1 1.63-.78l13 10.5a1 1 0 0 1-.57 1.76l-5.3.38 2.5 6.27a1 1 0 0 1-.55 1.3l-1.12.44a.9.9 0 0 1-.57.7Z"/></svg>
            <span>Click for Demo</span>
        </div>
    </div>
    @unless($hideFooter ?? false)
        <div class="project-preview-footer">
            <strong>{{ $previewProduct['name'] }}</strong>
            <a href="{{ $previewProduct['demo_url'] }}" target="_blank" rel="noopener noreferrer">Open demo <span aria-hidden="true">↗</span></a>
        </div>
    @endunless
</div>
