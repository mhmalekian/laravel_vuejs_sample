@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Faculty List
                    <a href="{{route('faculties.create')}}"><button class="btn btn-success float-right">Create New</button></a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                    @foreach($faculties as $faculty)
                        <li class="list-group-item"><a href="{{route('faculties.show',[$faculty->id])}}"><h4> {{$faculty->title}} </h4></a>
                            <span style="color:green;" >    Faculty Fields Count: {{count($faculty->fields)}}</span>
                            <a href="{{route('faculties.edit',[$faculty->id])}}">
                                <button type="button" class="btn btn-success btn-sm float-right">
                                    <span class="glyphicon glyphicon-remove"></span> Edit
                                </button>
                            </a>
                            <form method="POST" action="{{route('faculties.destroy',[$faculty->id])}}">
                                @method('DELETE')
                                @csrf

                                <input class="float-right btn btn-danger btn-sm  mr-2" type="submit" value="Remove">

                            </form>

                        @endforeach
                        </li>
                    </ul>
                    <div>{{$faculties->links()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
