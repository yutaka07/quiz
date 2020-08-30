@extends('layouts.app')

@section('content')
<div id="app">
  <router-view :question="{{$question}}" :choices="{{ $choice }}" title="{{ $question->problem }}"></router-view>
</div>

@endsection