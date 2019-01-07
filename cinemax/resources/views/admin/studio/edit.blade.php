@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Edit Studio</div>
				@foreach($studios as $studio)
                <div class="card-body">
                    <form method="POST" action="{{ route('studio.update', $studio->id) }}">
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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $studio->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="branch_id" class="col-md-4 col-form-label text-md-right">branch_id</label>

                            <div class="col-md-6">
                                <input id="branch_id" type="text" class="form-control{{ $errors->has('branch_id') ? ' is-invalid' : '' }}" name="branch_id" value="{{ $studio->branch_id }}" required autofocus>

                                @if ($errors->has('branch_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('branch_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="basic_price" class="col-md-4 col-form-label text-md-right">basic_price</label>

                            <div class="col-md-6">
                                <input id="basic_price" type="text" class="form-control{{ $errors->has('basic_price') ? ' is-invalid' : '' }}" name="basic_price" value="{{ $studio->basic_price }}" required autofocus>

                                @if ($errors->has('basic_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('basic_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="additional_friday_price" class="col-md-4 col-form-label text-md-right">additional_friday_price</label>

                            <div class="col-md-6">
                                <input id="additional_friday_price" type="text" class="form-control{{ $errors->has('additional_friday_price') ? ' is-invalid' : '' }}" name="additional_friday_price" value="{{ $studio->additional_friday_price }}" required autofocus>

                                @if ($errors->has('additional_friday_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('additional_friday_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="additional_saturday_price" class="col-md-4 col-form-label text-md-right">additional_saturday_price</label>

                            <div class="col-md-6">
                                <input id="additional_saturday_price" type="text" class="form-control{{ $errors->has('additional_saturday_price') ? ' is-invalid' : '' }}" name="additional_saturday_price" value="{{ $studio->additional_saturday_price }}" required autofocus>

                                @if ($errors->has('additional_saturday_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('additional_saturday_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="additional_sunday_price" class="col-md-4 col-form-label text-md-right">additional_sunday_price</label>

                            <div class="col-md-6">
                                <input id="additional_sunday_price" type="text" class="form-control{{ $errors->has('additional_sunday_price') ? ' is-invalid' : '' }}" name="additional_sunday_price" value="{{ $studio->additional_sunday_price }}" required autofocus>

                                @if ($errors->has('additional_sunday_price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('additional_sunday_price') }}</strong>
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
