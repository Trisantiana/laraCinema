<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Studio;
use App\Branch;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$branchs = Branch::all();
        $studios = Studio::all();
		
		return view('admin.studio.studio', compact('studios', 'branchs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$branchs = Branch::all();
        $studios = Studio::all();
		
		return view('admin.studio.add', compact('studios', 'branchs'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			
        Studio::create($request->all());
		
		return redirect()->route('studio.studio')->with('success', 'Added Successfull');
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
		$branchs = Branch::all();
		$studios = Studio::all();
        return view('admin.studio.edit', compact('studios', 'branchs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Studio $studio)
    {
        $studio->update($request->all());
		
		return redirect()->route('studio.studio', compact('studio'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studio $studio)
    {
		$studio->delete();
		
		return redirect()->route('studio.studio')->with('success', 'Deleted is Successfull');
    }
}
