@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{route('fields.index')}}">Fields List </a> >Field</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item">{{$field->title}}
                            <a href="{{route('fields.edit',[$field->id])}}">
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
