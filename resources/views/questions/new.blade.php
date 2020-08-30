@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('quiz Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('questions.create') }}">
            @csrf

            <div class="form-group row">
              <label for="problem" class="col-md-4 col-form-label text-md-right">{{ __('problem') }}</label>

              <div class="col-md-6">
                <input id="problem" type="text" class="form-control @error('problem') is-invalid @enderror" name="problem" value="{{ old('problem') }}" autocomplete="problem" autofocus>

                @error('problem')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __("Category") }}</label>
              <div class="col-md-3">
                <select class="form-control" id="category_id" name="category_id">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="choice1" class="col-md-4 col-form-label text-md-right">{{ __('choice').'1（正解）' }}</label>

              <div class="col-md-6">
                <input id="choice1" type="text" class="form-control @error('choice1') is-invalid @enderror" name="choice1" value="{{ old('choice1') }}" autocomplete="choice1" autofocus>

                @error('choice1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="choice2" class="col-md-4 col-form-label text-md-right">{{ __('choice').'2' }}</label>

              <div class="col-md-6">
                <input id="choice2" type="text" class="form-control @error('choice2') is-invalid @enderror" name="choice2" value="{{ old('choice2') }}" autocomplete="choice2" autofocus>

                @error('choice2')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="choice3" class="col-md-4 col-form-label text-md-right">{{ __('choice').'3' }}</label>

              <div class="col-md-6">
                <input id="choice3" type="text" class="form-control @error('choice3') is-invalid @enderror" name="choice3" value="{{ old('choice3') }}" autocomplete="choice3" autofocus>

                @error('choice3')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="choice4" class="col-md-4 col-form-label text-md-right">{{ __('choice').'4' }}</label>

              <div class="col-md-6">
                <input id="choice4" type="text" class="form-control @error('choice4') is-invalid @enderror" name="choice4" value="{{ old('choice4') }}" autocomplete="choice4" autofocus>

                @error('choice4')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection