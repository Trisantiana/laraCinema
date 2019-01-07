@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
			
                <div class="card-header">Shedule</div> <br>
					<form action=" {{ url('/search') }} " method="post">
						<div class="col-md-4 pull-right">  
							<input type="text" name="s" class="form-control" placeholder="Serach"/>
							<button type="submit" class="btn btn-xs btn-primary"> Cari </button>
							@csrf
						<div>
					
					</form
		
                <div class="card-body">
					<table class="table table-bordered">
		
						<tr>
							<thead>
								<th>No</th>
								<th>Movie id</th>
								<th> Start </th>
								<th> Price </th>
							</thead>
						</tr>
						@foreach($schedules as $schedule)
						<tbody>
							<tr>
								<td> {{ $schedule->id }} </td>
								<td> {{ $schedule->movie->name }} </td>
								<td> {{ $schedule->start }} </td>
								<td> {{ $schedule->price }} </td>
								
							</tr>
						</tbody>
						@endforeach
	
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

