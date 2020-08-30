@extends('layouts.app')

@section('content')

<div class="container">
        <h2>{{ __('MyQuestion List') }}</h2>
        <div class="row">

            @foreach ($questions as $question)

            <div class="col-sm-6 mb-5">
                <div class="card h-100 ">
                    <div class="card-body ">
                        <h3 class="card-title">{{ $question->problem }}</h3>
                        <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary">{{ __('Go Practice')  }}</a>
                        <form action="{{ route('questions.delete', $question->id) }}" method="POST" class="d-inline">
                          @csrf
                          <button class="btn btn-danger" onclick="return confirm('削除しますか');">{{ __('Go Delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection
