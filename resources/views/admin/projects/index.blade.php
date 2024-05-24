@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="text-center m-4 ">I MIEI PROGETTI</h1>

    <table class="table table-striped table-bordered">
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
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->language }}</td>
                    <td>
                        <img class="thumb mt-3"  src="{{ asset('storage/' . $project->image) }}"   onerror="this.src='/image/no-image.jpg'  ">
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-danger btn-sm me-1">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-danger btn-sm me-1">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare {{ $project->title }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="row justify-content-center">
        <div class="col-md-6">
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
