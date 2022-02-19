@extends('layout')

@section('content')
    <div class="container">
        <div class="text-3xl mb-3 text-center">Nouvelle référence</div>
        <form method="post" action="/references">
            @csrf
            <div class="form-group row">
                <label for="txtDescription" class="col-sm-2 col-form-label text-right">Description</label>
                <div class="col-sm-10">
                    <input type="text" id="txtDescription" name="description" class="form-control" pattern="\s*(?:\S\s*){10,}$">
                </div>
            </div>
            <div class="form-group row">
                <label for="txtURL" class="col-sm-2 col-form-label text-right">URL</label>
                <div class="col-sm-10">
                    <input type="url" id="txtURL" name="url" class="form-control" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
