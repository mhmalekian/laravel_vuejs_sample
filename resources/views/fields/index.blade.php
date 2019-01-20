@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fields List
                    <a href="{{route('fields.create')}}"><button class="btn btn-success float-right">Create New</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                    @foreach($fields as $field)
                        <li class="list-group-item"><a href="{{route('fields.show',[$field->id])}}"><h4 class="d-inline"> {{$field->title}}  </h4></a>
                           <span class="d-inline-block">{{$field->faculty->title}}</span>
                            <div >
                            <a href="{{route('fields.edit',[$field->id])}}">
                                <button type="button" class="d-block btn btn-success btn-sm float-right">
                                    <span class="glyphicon glyphicon-remove"></span> Edit
                                </button>
                            </a>

                            <form method="POST" action="{{route('fields.destroy',[$field->id])}}">
                                @method('DELETE')
                                @csrf

                                <input class="d-block float-right btn btn-danger btn-sm  mr-2" type="submit" value="Remove">

                            </form>
                            </div>
                        @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
