<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Image;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
		
		return view('admin.movie.movie', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		
        $movies = Movie::all();
		
		return view('admin.movie.add', compact('movies'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate(request(),[
			'name' => 'required',
			'minute_length' => 'required',
		]);
			
			$image = $request->file('picture');
			$input['imgName'] = date('Y-m-d') . ".jpg";
			$path = public_path('/images');
			$image->move($path, $input['imgName']);
			
			
			
        Movie::create([
			'name' => $request->name,
			'minute_length' => $request->minute_length,
			'picture' => $image,
		]);
		
		return redirect()->route('movie.movie')->with('success', 'Added Successfull');
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
		$movies = Movie::all();
        return view('admin.movie.edit', compact('movies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->all());
		
		return redirect()->route('movie.movie', compact('movie'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
		$movie->delete();
		
		return redirect()->route('movie.movie')->with('success', 'Deleted is Successfull');
    }
}
