@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(isset($student))Edit Field @else Create New Field @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="@if(isset($student)){{route('students.update',[$student->id])}}@else{{route('students.store')}}@endif">
                        @if(isset($student)) @method('PUT') @endif
                        @csrf
                        <div><span class="mb-1 d-inline-block" >Student Number
                            <input class="form-control" id="student_number" name="student_number" type="text" @if(isset($student)) value="{{$student->student_number}}" @endif placeholder="شماره دانشجویی">
                                </span>

                            <span class="mb-1 d-inline-block">Person<select class="custom-select" name="person_id" >
                                @foreach($persons as $person)
                                        <option class="custom-select" value="{{$person->id}}" @if(isset($student) && $student->person!=null && $student->person->id==$person->id) selected @endif>{{$person->first_name}} {{$person->last_name}} </option>
                                    @endforeach
                            </select>
                                </span>
                            <span class="mb-1 d-inline-block">Faculty<select id="facultybox" class="custom-select" name="faculty_id"  id="faculty" ONCHANGE="callrelatedfield()">
                                @foreach($faculties as $faculty)
                                    <option class="custom-select" value="{{$faculty->id}}" @if(isset($student) && $student->faculty!=null && $student->faculty->id==$faculty->id) selected @endif>{{$faculty->title}} </option>
                                    @endforeach
                            </select>
                                </span>
                            <span class="mb-1 d-inline-block">Field<select id="fieldsbox" class="custom-select" name="field_id" >
                                @foreach($fields as $field)
                                        <option class="custom-select" value="{{$field->id}}" @if(isset($student) && $student->field!=null && $student->field->id==$field->id) selected @endif>{{$field->title}} </option>
                                    @endforeach
                            </select>
                                </span>
                            <span class="mb-1 d-inline-block">Section<select class="custom-select" name="section_id" >
                                @foreach($sections as $section)
                                        <option class="custom-select" value="{{$section->id}}" @if(isset($student) && $student->section!=null && $student->section->id==$section->id) selected @endif>{{$section->title}} </option>
                                    @endforeach
                            </select>
                                </span>

                            <input type="submit" class="btn btn-success btn-sm form-control mt-2" value="Submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('new_script')
    <script>
function callrelatedfield()
    {
        //alert("kkkk");
        var item=document.getElementById("facultybox");
        var faculty=item.options[item.selectedIndex].value;
        var myurl="{{url('getfields')}}"+"/"+faculty;
        $.ajax({
            url: myurl,
            method: 'GET',
            success: function( data ) {
                if(data!="failed") {
                    //var obj = JSON.parse(data);
                    var html="";
                    console.log( data.length);
                    for (index = 0; index < data.length; ++index) {
                       var myitem= data[index]
                       html+="<option class=\"custom-select\" value=\""+myitem['id']+"\">"+myitem['title']+"<\option>";
                    }
                    $("#fieldsbox").html(html);
                    //console.log(data);
                }
                else {
                    alert("You have a problem!");
                }

            }
        });
    }
    </script>
@endpush