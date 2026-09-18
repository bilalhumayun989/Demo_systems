<div class="project-preview" data-project-preview>
    <div class="project-preview-viewport">
        @if($previewProduct['embed_enabled'] ?? true)
            <iframe data-src="{{ $previewProduct['demo_url'] }}" title="{{ $previewProduct['name'] }} live project preview" loading="lazy" referrerpolicy="strict-origin-when-cross-origin" sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-popups-to-escape-sandbox" hidden></iframe>
            <p class="project-preview-message">Explore {{ $previewProduct['name'] }} in a new tab using the link below.</p>
        @else
            <div class="project-preview-unavailable" aria-label="{{ $previewProduct['name'] }} project overview">
                <span class="preview-category">{{ $previewProduct['eyebrow'] }}</span>
                <strong>{{ $previewProduct['name'] }}</strong>
                <p>{{ $previewProduct['tagline'] }}</p>
                <span class="preview-availability">Live preview unavailable here</span>
                <a href="{{ $previewProduct['demo_url'] }}" target="_blank" rel="noopener noreferrer">Launch demo in a new tab <span aria-hidden="true">↗</span></a>
            </div>
        @endif
    </div>
    <div class="project-preview-footer">
        <strong>{{ $previewProduct['name'] }}</strong>
        <a href="{{ $previewProduct['demo_url'] }}" target="_blank" rel="noopener noreferrer">Open demo <span aria-hidden="true">↗</span></a>
    </div>
</div>
