@extends('layout')

@section('content')
    <div class="container p-3">
        <div class="row text-xl">
            <p>{{ $practice->description }}</p>
            <p class="text-right"><i class="fa fa-info-circle toggling float-right" data-target="details"></i></p>
        </div>
        <div id="details" class="d-none">
            <div class="row">
                <div class="col-1 border bg-light">Domaine</div>
                <div class="col-11">{{ $practice->domain->name }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Soumis par</div>
                <div class="col-11">{{ $practice->submitter->name }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Le</div>
                <div class="col-11">{{ Carbon\Carbon::make($practice->created_at)->isoformat('D MMMM Y') }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Modifié le</div>
                <div class="col-11">{{ Carbon\Carbon::make($practice->updated_at)->isoformat('D MMMM Y') }}</div>
            </div>
            <div class="row">
                <div class="col-1 border bg-light">Etat</div>
                <div class="col-11">{{ $practice->publicationState->name }}</div>
                @can ('publish', $practice)
                    <x-publish-practice-form :id="$practice->id"/>
                @endcan
            </div>
        </div>

        <x-opinion-list :opinions="$practice->opinions"/>

        @if (!$practice->opinionOf(Auth::user()))
            <x-opinion-form :on="$practice->id"/>
        @endif
    </div>
@endsection
