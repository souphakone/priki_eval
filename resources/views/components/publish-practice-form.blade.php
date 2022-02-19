<div>
    <form action="{{ route('practices.publish') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $practice_id }}" name="practice">
        <button type="submit" class="btn btn-primary">Publier</button>
    </form>
</div>
