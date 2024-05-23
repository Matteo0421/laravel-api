@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="text-center m-4 ">Tipologie</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Categorie</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->title }}</td>
                    <td>{{ $type->categories }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-primary btn-sm me-1">
                                <i class="fa-solid fa-pencil"></i> Modifica
                            </a>
                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare {{ $type->title }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Elimina
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
