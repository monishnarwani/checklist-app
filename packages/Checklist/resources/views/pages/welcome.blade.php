@extends('Checklist::pages.master')

@section('content')
    <div id="app">
        <checklist-main></checklist-main>
    </div>
@endsection

@section('footer')
    <script src="{{mix('js/app.js')}}"></script>
@endsection