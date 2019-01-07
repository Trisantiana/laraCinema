@extends('layouts.app-admin')

@section('content')
	<div class="justify-content-center">
	<h1> Branch </h1>
	<a href=" {{ route('branch.create') }} " class="btn btn-primary" style="float: left; margin-left: 50px; margin-bottom: 10px;"> <i class="fa fa-plus"> </i> Add </a>
		<table class="table table-striped">
		
			<tr>
				<thead>
					<th>No</th>
					<th>Name</th>
					<th> Action </th>
				</thead>
			</tr>
			@foreach($branchs as $key => $branch)
			<tbody>
				<tr>
					<td> {{ $key + 1 }} </td>
					<td> {{ $branch->name }} </td>
					<td>
						<a href=" {{ route('branch.edit', $branch->id) }} " class="btn btn-primary"> Edit </a>
						<form action="{{ route('branch.destroy', $branch->id) }}" method="post">
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