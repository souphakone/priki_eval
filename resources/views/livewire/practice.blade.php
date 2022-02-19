<div>
    <div class="card p-2 m-2 border border-2 border-dark shadow" wire:click="show({{ $practice->id }})">
        {{ $practice->description }}
        <div class="text-xs text-right">
            @if ($showDomain)
                Domaine: {{ $practice->domain->name }},
            @endif
            @if ($showState)
                Etat: {{ $practice->publicationState->name }},
            @endif
            mis à jour: {{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}
        </div>
    </div>
</div>
