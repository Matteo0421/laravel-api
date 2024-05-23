@extends('layouts.admin')

@section('content')

<h2 class="p-3">I miei Progettiiiii</h2>

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

<div class="d-flex my-4 p-3" >
    <form action="{{route('admin.projects.store')}}" method="POST" class="d-flex">
        @csrf
        <input type="search" placeholder="Nuovo Progetto" aria-label="Search" class="form-control me-2">
        <button class="btn btn-outline-success " type='submit'>invia</button>
    </form>
</div>

<div >
    <table class="table w-75 m-3 ">
        <thead>
          <tr>
            <th scope="col">Titolo</th>
            {{-- <th scope="col">Descrizione </th>
            <th scope="col">Linguaggio di Programmazione</th> --}}
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $item )
            <tr>
                <td>
                    <input type="text" value="{{$item->title}}">
                </td>
                {{-- <td>{{$item->description}}</td>
                <td>{{$item->language}}</td> --}}
                <td class="d-flex">
                    <button class="btn btn-warning "><i class="fa-solid fa-pencil"></i></button>
                    <button class="btn btn-danger "><i class="fa-solid fa-trash-can"></i></button>
                </td>
              </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
