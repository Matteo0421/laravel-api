

@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="text-center m-4 text-white  ">I MIEI PROGETTI</h1>

    @if (session('error'))

    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @endif

    @if (session('succes'))

    <div class="alert alert-succes" role="alert">
        {{session('succes')}}
    </div>
    @endif

<table class="table ">
    <thead>
      <tr>
        <th scope="col">TITOLO</th>
        <th scope="col">DESCRIZIONE</th>
        <th scope="col">LINGUAGGIO</th>
        <th scope="col">IMG</th>
        <th scope="col">AZIONI</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project  )


        <tr>
            <th >{{$project->title}}</th>
            <th >{{$project->description}}</th>
            <th >{{$project->language}}</th>
            <th >mettere immagini nel caso</th>
            <th class="d-flex ">
              <a href="{{ route('admin.projects.show', $project->id)}}" class="btn btn-danger"><i class="fa-regular fa-eye"></i></a>
              <a href="{{ route('admin.projects.edit' , $project)}}" class="btn btn-danger"><i class="fa-solid fa-pencil"></i></a>

              <form
               action="{{route('admin.projects.destroy', $project)}}"
               method="POST"
               onsubmit="return confirm('sei sicuro di voler eliminare {{ $project->title}}?')"
               >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>


             </form>
            </th>

        </tr>
        @endforeach


        </tbody>
  </table>


</div>

@endsection
