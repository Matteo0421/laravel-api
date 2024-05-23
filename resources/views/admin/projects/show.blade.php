@extends('layouts.admin')

@section('content')

<h1 class="my-3 text-center ">{{$project->title}}</h1>

<div class="row flex-column ">
    {{-- <div class="col d-flex  justify-content-center   ">
        <img class="img-fluid  bg-dark" src="{{$project->thumb}}" alt="">
    </div> --}}

    <div class="col m-4">
        <span class="fs-2 ">Descrizione</span>
        <p class="mt-3"> {{$project->description}}</p>
        <div class="col d-flex my-3">
            <p class="pe-2">{{$project->language}} |</p>
        </div>




        <div class="my-5">
            <a href="{{route('admin.projects.index')}}" class="btn btn-danger "><i class="fa-solid fa-backward"></i></a>
        </div>


    </div>

</div>

@endsection
