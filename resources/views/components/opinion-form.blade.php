<div class="row mt-3">
    <div class="col-2 small text-gray-500 toggling mb-2" data-target="opinions">
        <div class="bg-warning">
            Mon opinion:
        </div>
    </div>
    <div class="col-10 row">
        <form action="/opinion" method="post">
            @csrf
            <input type="hidden" value="{{ $practice_id }}" name="practice">
            <div class="row">
                <textarea id="opinion" name="opinion" class="col-10" required></textarea>
                <button type="submit" class="btn btn-sm btn-primary col-2">Soumettre</button>
            </div>
        </form>
    </div>
</div>

