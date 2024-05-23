@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="text-center m-4">Elenco delle Tecnologie</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Linguaggio</th>
                <th scope="col">File</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tecnologies as $tencology)
            <tr>
                <td>{{ $tencology->title }}</td>
                <td>{{ $tencology->language }}</td>
                <td>{{ $tencology->file }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('admin.tecnologies.show', $tencology->id) }}" class="btn btn-danger btn-sm me-1">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.tecnologies.edit', $tencology->id) }}" class="btn btn-danger btn-sm me-1">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.tecnologies.destroy', $tencology->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">
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
            {{ $tecnologies->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@endsection
