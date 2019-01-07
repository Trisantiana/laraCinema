@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Edit Movie</div>
				@foreach($movies as $movie)
                <div class="card-body">
                    <form method="POST" action="{{ route('movie.update', $movie->id) }}" enctype="multipart/form-data">
                        @csrf
						@method('PATCH')
						
						<div class="form-group row">
                            <div class="col-md-6">
                                <input id="id" type="hidden"  name="id" required autofocus>
                      
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $movie->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="minute_length" class="col-md-4 col-form-label text-md-right">minute_length</label>

                            <div class="col-md-6">
                                <input id="minute_length" type="text" class="form-control{{ $errors->has('minute_length') ? ' is-invalid' : '' }}" name="minute_length" value="{{ $movie->minute_length }}" required autofocus>

                                @if ($errors->has('minute_length'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('minute_length') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="picture" class="col-md-4 col-form-label text-md-right">picture</label>

                            <div class="col-md-6">
                                <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ asset('/images/' .$movie->picture) }}" required autofocus>

                                @if ($errors->has('picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>

                                
                            </div>
                        </div>
                    </form>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
