@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="my-3">Nuova Tecnologia</h1>

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('admin.tencologies.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="language" class="form-label">Linguaggio</label>
                    <input name="language" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input name="file" type="text" class="form-control">
                </div>

                <div class="mb-4 mt-4">
                    <button class="btn btn-danger" type="submit">Aggiungi Tecnologia</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
