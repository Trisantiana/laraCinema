@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Add Schedule</div>
				
                <div class="card-body">
                    <form method="POST" action="{{ route('schedule.store') }}">
                        @csrf
						
						<div class="form-group row">
                            <div class="col-md-6">
                                <input id="id" type="hidden"  name="id" required autofocus>
                      
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="movie_id" class="col-md-4 col-form-label text-md-right">movie_id</label>
								
								<div class="col-md-6">
									<select name="movie_id" class="form-control">
									@foreach($movies as $movie)
										<option value=" {{ $movie->id }} "> {{ $movie->name }}
										
										</option>
									@endforeach
									</select>
								</div>
								
                        </div>
						
						<div class="form-group row">
                            <label for="studio_id" class="col-md-4 col-form-label text-md-right">studio </label>
								
								<div class="col-md-6">
									<select name="studio_id" class="form-control">
									@foreach($studios as $studio)
										<option value=" {{ $studio->id }} "> {{ $studio->name }}
										
										</option>
									@endforeach
									</select>
								</div>
								
                        </div>
						
						<div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">start</label>

                            <div class="col-md-6">
                                <input id="start" type="datetime-lokal" class="form-control{{ $errors->has('start') ? ' is-invalid' : '' }}" name="start" value=" {{ $start }} " required autofocus>

                                @if ($errors->has('start'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="end" class="col-md-4 col-form-label text-md-right">end</label>
							
                            <div class="col-md-6">
                                <input id="end" type="text" class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" name="end" value="  " required autofocus>

                                @if ($errors->has('end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                @endif
                            </div>
							
                        </div>
						
						<div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
