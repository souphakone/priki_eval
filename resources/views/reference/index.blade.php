@extends('layout')

@section('content')
    <div class="container">
        <div class="text-3xl mb-3">Liste des références</div>
        <table class="table-auto border-black rounded">
            <tr>
                <th>Auteurs</th>
                <th>Titres</th>
                <th>Date de parution</th>
                <th>Descriptions</th>
                <th></th>
            </tr>
            @foreach($references as $reference)
            <tr>
                <td>{{ $reference->author }}</td>
                <td>{{ $reference->title }}</td>
                <td>{{ $reference->create_at }}</td>
                <td>{{ $reference->description }}</td>
                <td>
                    <a href="{{ $reference->url }}" target="_blank">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Voir
                    </button>
                    </a>
                </td>

            </tr>
            @endforeach
        
        </table>
        <a href="/references/create" class="btn btn-success btn-sm">Ajouter une nouvelle référence</a>
    </div>
@endsection
