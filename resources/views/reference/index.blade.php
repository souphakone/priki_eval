@extends('layout')

@section('content')
    <div class="container">
        <div class="text-3xl mb-3">Liste des références</div>
        @foreach($references as $reference)
            <div>
                @if ($reference->url)
                    <a href="{{ $reference->url }}" target="_blank">{{ $reference->description }}</a>
                @else
                    {{ $reference->description }}
                @endif
            </div>
        @endforeach
        <a href="/references/create" class="btn btn-success btn-sm">Ajouter une nouvelle référence</a>
    </div>
@endsection
