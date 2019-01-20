@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if(isset($faculty))Edit Faculty @else Create New Faculty @endif
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

                    <form method="POST" action="@if(isset($faculty)){{route('faculties.update',[$faculty->id])}}@else{{route('faculties.store')}}@endif">
                        @if(isset($faculty)) @method('PUT') @endif
                        @csrf
                        <div>Title:
                            <input id="title" name="title" type="text" @if(isset($faculty)) value="{{$faculty->title}}" @endif placeholder="عنوان دانشکده">
                            <input type="submit" class="btn btn-success btn-sm" value="Submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
