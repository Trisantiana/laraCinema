@extends('layouts.app-admin')

@section('content')
	<div class="justify-content-center">
	<h1> Movie </h1>
	<a href=" {{ route('movie.create') }} " class="btn btn-primary" style="float: left; margin-left: 50px; margin-bottom: 10px;"> <i class="fa fa-plus"> </i> Add </a>
		<table class="table table-striped">
		
			<tr>
				<thead>
					<th>No</th>
					<th>Name</th>
					<th> Minute Length </th>
					<th> Picture </th>
					<th> Action </th>
				</thead>
			</tr>
			@foreach($movies as $movie)
			<tbody>
				<tr>
					<td> {{ $movie->id }} </td>
					<td> {{ $movie->name }} </td>
					<td> {{ $movie->minute_length }} </td>
					<td> <img src="/../../images/{{ $movie->picture }}"> </td>
					<td>
						<a href=" {{ route('movie.edit', $movie->id) }} " class="btn btn-primary"> Edit </a>
						<form action="{{ route('movie.destroy', $movie->id) }}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger"> Hapus </button>	
						</form>
						
						
					</td>
				</tr>
			</tbody>
			@endforeach
	
		</table>
	</div>
@endsection