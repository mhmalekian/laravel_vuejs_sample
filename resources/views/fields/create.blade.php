@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(isset($field))Edit Field @else Create New Field @endif
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

                    <form method="POST" action="@if(isset($field)){{route('fields.update',[$field->id])}}@else{{route('fields.store')}}@endif">
                        @if(isset($field)) @method('PUT') @endif
                        @csrf
                        <div><span class="mb-1 d-inline-block" >Title
                            <input class="form-control" id="title" name="title" type="text" @if(isset($field)) value="{{$field->title}}" @endif placeholder="عنوان رشته">
                                </span>

                            <span class="mb-1 d-inline-block">Faculty<select class="custom-select" name="faculty" >
                                @foreach(App\Models\Faculty::all() as $faculty)
                                    <option class="custom-select" value="{{$faculty->id}}" @if(isset($field) && $field->faculty->id==$faculty->id) selected @endif>{{$faculty->title}} </option>
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
