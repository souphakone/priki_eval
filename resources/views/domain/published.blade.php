@extends ('layout')

@section ('content')
    <div class="title text-center">Pratiques publiées sans le domaine {{ $domain->name }}:</div>
    @include('practice._list', ['practices' => $domain->publishedPractices(),'showDomain' => false,'showState' => false])
@endsection
