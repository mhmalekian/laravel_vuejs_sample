<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Field;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faculties=Faculty::paginate(10);
        return view('faculty.index',compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' =>  'required|min:3|max:50|unique:faculties|alpha'
        ]);

        $myfaculty=new Faculty();
        $myfaculty->title=$request->title;

        $myfaculty->save();

        return redirect('faculties');
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
        $faculty=Faculty::find($id);
        return view('faculty.show',compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $faculty=Faculty::find($id);
        return view('faculty.create',compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $faculty=Faculty::find($id);

        $faculty->title=$request->title;
        $faculty->save();

        return view('faculty.show',compact('faculty'));
        //return $faculty;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $faculty=Faculty::find($id);
        $faculty->delete();

        return redirect('faculties');
    }

    public function getrelatedfields($faculty)
    {
        if($faculty!=null && $faculty!=0)
        {
            $fields=Field::where('faculty_id',$faculty)->get();
            return $fields;

        }
        return "failed";

    }
}
