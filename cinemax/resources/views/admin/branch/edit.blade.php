@extends('layouts.app-admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Edit Branch</div>
				
                <div class="card-body">
				@foreach($branchs as $branch)
                    <form method="POST" action="{{ route('branch.update', $branch->id) }}">
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
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $branch->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
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
