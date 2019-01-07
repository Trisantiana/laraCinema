@extends('layouts.app-admin')

@section('content')
	<div class="justify-content-center">
	<h1> Studio </h1>
	<a href=" {{ route('studio.create') }} " class="btn btn-primary" style="float: left; margin-left: 50px; margin-bottom: 10px;"> <i class="fa fa-plus"> </i> Add </a>
		<table class="table table-striped">
		
			<tr>
				<thead>
					<th>No</th>
					<th>Name</th>
					<th> Branch </th>
					<th> Basic Price </th>
					<th> Additional Friday Price </th>
					<th> Additional Saturday Price </th>
					<th> Additional Sunday Price </th>
					<th> Action </th>
				</thead>
			</tr>
			@foreach($studios as $key => $studio)
			<tbody>
				<tr>
					<td> {{ $key + 1 }} </td>
					<td> {{ $studio->name }} </td>
					<td> {{ $studio->branch->name }} </td>
					<td> {{ $studio->basic_price }} </td>
					<td> {{ $studio->additional_friday_price }} </td>
					<td> {{ $studio->additional_saturday_price }} </td>
					<td> {{ $studio->additional_sunday_price }} </td>
					<td>
						<a href=" {{ route('studio.edit', $studio->id) }} " class="btn btn-primary"> Edit </a>
						<form action="{{ route('studio.destroy', $studio->id) }}" method="post">
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