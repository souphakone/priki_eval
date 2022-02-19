<div>
    <div class="h5">Opinions</div>
    @forelse($opinions as $opinion)
        <x-opinion :opinion="$opinion" />
    @empty
        <p>Aucun</p>
    @endforelse
</div>
