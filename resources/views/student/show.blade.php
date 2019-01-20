@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('students.index')}}">Student List </a> >Student</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item">{{$student->student_number}}
                            <br>
                            @if($student->person!=null){{$student->person->last_name}} || {{$student->person->first_name}} || @endif {{$student->register_date}}
                            <a href="{{route('fields.edit',[$student->id])}}">
                                <button type="button" class="btn btn-success btn-sm float-right">
                                    <span class="glyphicon glyphicon-remove"></span> edit
                                </button>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
