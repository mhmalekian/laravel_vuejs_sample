<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Field;
use App\Models\Person;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $fillable=['student_number','faculty_id','field_id','person_id'];
    public function __construct()
    {
        $this->middleware('auth',['except' =>['index']]);
    }
    public function index()
    {
        //
        $students=Student::all();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $faculties=Faculty::all();
        $sections=Section::all();
        $persons=Person::all();
        $fields=Field::all();
        return view('student.create', compact('faculties','sections','persons','fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student=new Student();
        $student->student_number=$request->student_number;
        //$student->faculty_id=$request->faculty_id;
        $student->field_id=$request->field_id;
        $student->person_id=$request->person_id;
        $student->section_id=$request->section_id;
        $student->save();

        return redirect(route('students.index'));// view('student.create',compact('sections','faculties','fields'));
        //
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
        if(isset($id))
        {
            $student=Student::find($id);
            return view('student.show',compact('student'));
        }
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
        $student=Student::find($id);
        $persons=Person::all();
        $faculties=Faculty::all();
        $sections=Section::all();
        $fields=Field::all();
        return view('student.create',compact('student','sections','faculties','fields','persons'));
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
        if(isset($id)) {
            $student = Student::find($id);
            $student->student_number=$request->student_number;
            //$student->faculty_id=$request->faculty_id;
            $student->field_id=$request->field_id;
            $student->person_id=$request->person_id;
            $student->section_id=$request->section_id;
            $student->save();
            return redirect(route('students.index'));

        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id)) {
            $student = Student::find($id);
            if ($student!=null)
            {
                $student->delete();

                return redirect(route('students.index'));
            }
        }
        //
    }
}
