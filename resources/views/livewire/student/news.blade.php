<x-card title="Nyheter">
    @forelse($news as $current)
        <h6>{{ $current->title }}
            @if(auth()->user()->hasRole('admin'))
                <a href="#" class="small">Rediger</a>
            @endif
        </h6>
        <p>{{ $current->content }}</p>
    @empty
        <p>Ingen nyheter.</p>
    @endforelse
    @if(auth()->user()->hasRole('admin'))
        <p><a href="#" class="small">Legg til ny</a></p>
    @endif
</x-card>
