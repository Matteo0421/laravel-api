@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="my-3">{{ $tencology->title }}</h1>

    <div class="row">
        <div class="col-md-6">
            <p><strong>Linguaggio:</strong> {{ $tencology->language }}</p>
            <p><strong>File:</strong> {{ $tencology->file }}</p>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.tencologies.index') }}" class="btn btn-danger"><i class="fa-solid fa-backward"></i></a>
    </div>
</div>

@endsection
