@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="my-3">Modifica Progetto</h1>

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
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                        name="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        value="{{ old('title', $project->title) }}">
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea
                        name="description"
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        rows="5">{{ old('description', $project->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="language" class="form-label">Lingua</label>
                    <input
                        name="language"
                        type="text"
                        class="form-control @error('language') is-invalid @enderror"
                        id="language"
                        value="{{ old('language', $project->language) }}">
                    @error('language')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <button class="btn btn-danger" type="submit">Aggiorna il Progetto</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

