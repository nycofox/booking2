<div class="card shadow mb-3">
    @if(isset($title))
        <div class="card-header">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
