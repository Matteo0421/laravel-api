@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="my-3">Nuovo Progetto</h1>

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
           <form
              action="{{ route('admin.projects.store') }}"
              method="POST"
              enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input
                        name="title"
                        type="text"
                        class="form-control @error('title') is-invalid @enderror"
                        id="title"
                        value="{{ old('title') }}">
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
                        rows="5">{{ old('description') }}</textarea>
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
                        value="{{ old('language') }}">
                    @error('language')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                 <input
                   name="image"
                   type="file"
                   onchange="showImage(event)"
                   class="form-control @error('image') is-invalid @enderror"
                   id="image">

                   <img class="thumb mt-3" id="thumb" src="{{ asset('/image/no-image.jpg') }}" alt="Default Image" style="width: 150; height: auto;">
                </div>

                <div class="mb-4 mt-4">
                    <button class="btn btn-danger" type="submit">Invia il nuovo Progetto</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showImage(event){
        const thumb = document.getElementById('thumb');
        thumb.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection


