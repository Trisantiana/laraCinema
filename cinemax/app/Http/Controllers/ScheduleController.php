<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use App\Schedule;
use App\Movie;
use DB;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function search(Request $request) {
		// $schedules = Schedule::all();
		$movie = Movie::all();
		$search = $request->get('s');

		$schedules = DB::table('schedules')->where('price',  'LIKE', '%'  . $search . '%');
		return redirect()->route('user', compact('schedules'));
	}
	 
    public function index()
    {
		$schedules = Schedule::all();
        $studios = Studio::all();
		$movies = Movie::all();
		
		return view('admin.schedule.schedule', compact('studios', 'schedules', 'movies'));
    }
	
	public function user(Schedule $schedule )
    {
		$schedules = Schedule::all();
		$studios = Studio::all();
		$movies = Movie::all();
		
		return view('home', compact('studios', 'schedules', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Schedule $schedule, Movie $movie, Studio $studio)
    {
		
		
		$schedules = Schedule::all();
        $studios = Studio::all();
		$movies = Movie::all();
		$start =  substr(date(now()), 11, 19);
		$start_exp = explode(':', $start);
		// $minute = Movie::find('minute_length');
		// $jadwal = DB::table('movies')
			// ->join('schedules', 'movies.id', '=' , 'schedules.movie_id')
			// ->select('movies.id, movies.minute_length')
			// // ->get();
		 $price = DB::table('schedules')
			->join('studios', 'studios.id', '=', 'schedules.studio_id')
			->join('movies', 'movies.id', '=', 'schedules.movie_id')
			->select('studios.*', 'movies.*')
			->get();
		
		// $join = "select movies.*, studios.* from movies, studios where schedules.movie_id=movies.id and schedules.studio_id = studios.id";
			
		//$end = ($start_exp[0] + $mnt_exp[0]).":".($start_exp[1] + $mnt_exp[1]).":".($start_exp[2] + $mnt_exp[2]);

		$basic = DB::table('studios')
			->select(['basic_price'])
			->get();
			
		$friday = DB::table('studios')
			->select(['additional_friday_price'])
			->get();
			
		$price = DB::table('studios')
			->whereRaw('additional_friday_price')
			->get();
			
		
		return view('admin.schedule.add', compact('studios', 'schedules', 'movies', 'start', 'basic', 'friday', 'price'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			
        Schedule::create($request->all());
		
		return redirect()->route('schedule.schedule')->with('success', 'Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
		$schedules = Schedule::all();
		$studios = Studio::all();
		$movies = Movie::all();
        return view('admin.schedule.edit', compact('studios', 'schedules', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->all());
		
		return redirect()->route('schedule.schedule', compact('schedule'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
		$schedule->delete();
		
		return redirect()->route('schedule.schedule')->with('success', 'Deleted is Successfull');
    }
}
