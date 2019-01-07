@extends('layouts.app-admin')

@section('content')
	<div class="justify-content-center">
	<h1> Shedule </h1>
	<a href=" {{ route('schedule.create') }} " class="btn btn-primary" style="float: left; margin-left: 50px; margin-bottom: 10px;"> <i class="fa fa-plus"> </i> Add </a>
		<table class="table table-striped">
		
			<tr>
				<thead>
					<th>No</th>
					<th>Movie id</th>
					<th> Studio id </th>
					<th> Start </th>
					<th> End </th>
					<th> Price </th>
					<th> Action </th>
				</thead>
			</tr>
			@foreach($schedules as $key => $schedule)
			<tbody>
				<tr>
					<td> {{ $key+1 }} </td>
					<td> {{ $schedule->movie->name }} </td>
					<td> {{ $schedule->studio->name }} </td>
					<td> {{ $schedule->start }} </td>
					<td> {{ $schedule->end }} </td>
					<td> {{ $schedule->price }} </td>
					<td>
						<a href=" {{ route('schedule.edit', $schedule->id) }} " class="btn btn-primary"> Edit </a>
						<form action="{{ route('schedule.destroy', $schedule->id) }}" method="post">
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