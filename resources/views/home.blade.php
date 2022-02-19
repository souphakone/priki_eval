@extends('layout')

@section('content')
    <div class="title text-center">Les news de ces <input id="numDays" class="col-1 text-center text-3xl font-bold border-0" type="number" value="{{ $filtervalue }}"> derniers jours:</div>
    @include('practice._list', ['practices' => \App\Models\Practice::publishedAndRecentlyUpdated($filtervalue),'showDomain' => true,'showState' => false])
@endsection
@push('page-specific-scripts')
    <script src="/js/homepage.js" defer></script>
@endpush
