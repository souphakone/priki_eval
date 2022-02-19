@extends('layout')

@section('content')
    <div class="container p-3">
        @foreach(\App\Models\Domain::all() as $domain)
            <div class="h1">{{ $domain->name }}</div>
            @include('practice._list', ['practices' => $domain->practicesOrderedByState(),'showDomain' => true,'showState' => true])
        @endforeach
    </div>
@endsection
