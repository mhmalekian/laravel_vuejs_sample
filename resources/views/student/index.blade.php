@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Students List
            <a href="{{route('students.create')}}"><button class="btn-success float-right">Create</button></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                    @foreach($students as $student)
                            <li class="list-group-item"><a href="{{route('students.show',[$student->id])}}">{{$student->student_number}}</a>
                                <span class="d-inline-block">@if($student->field!=null && $student->field->faculty!=null){{$student->field->faculty->title}} @endif @if($student->field!=null){{$student->field->title}}@endif
                                @if($student->person!=null){{$student->person->last_name}}@endif
                                </span>
                                <a href="{{route('students.edit',[$student->id])}}">
                                    <button type="button" class="d-block btn btn-success btn-sm float-right">
                                        <span class="glyphicon glyphicon-remove"></span> Edit
                                    </button>
                                </a>

                                <form method="POST" action="{{route('students.destroy',[$student->id])}}">
                                    @method('DELETE')
                                    @csrf

                                    <input class="d-block float-right btn btn-danger btn-sm  mr-2" type="submit" value="Remove">

                                </form>
                            </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
