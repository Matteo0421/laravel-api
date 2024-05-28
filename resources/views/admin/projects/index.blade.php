@extends('layouts.admin')

@section('content')

<div class="container">
    <h1 class="text-center m-4">I MIEI PROGETTI</h1>

    <!-- Barra di ricerca -->
    <div class="row mb-3">
        <div class="col-md-6">
            <input type="text" id="search-input" class="form-control" placeholder="Cerca progetti...">
        </div>
    </div>

    <table class="table table-striped table-bordered" id="projects-table">
        <thead>
            <tr>
                <th scope="col">TITOLO</th>
                <th scope="col">CATEGORIA</th>
                <th scope="col">DESCRIZIONE</th>
                <th scope="col">TECNOLOGIE</th>
                <th scope="col">LINGUAGGIO</th>
                <th scope="col">IMG</th>
                <th scope="col">AZIONI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td class="project-title">{{ $project->title }}</td>
                    <td class="project-category">{{ $project->type->categories ?? '' }}</td>
                    <td class="project-description">{{ $project->description }}</td>
                    <td class="project-tecnology">
                        @forelse ($project->tecnologies as $tecnology )
                            <span class="badge text-bg-danger">{{$tecnology->title}}</span>
                        @empty
                            - no results -
                        @endforelse
                    </td>
                    <td class="project-language">{{ $project->language }}</td>
                    <td>
                        <img class="thumb mt-3" src="{{ asset('storage/' . $project->image) }}" onerror="this.src='{{ asset('image/no-image.jpg') }}'" alt="Project Image" style="width: 150px; height: auto;">
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

<script>
    document.getElementById('search-input').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const projectsTable = document.getElementById('projects-table');
        const rows = projectsTable.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) { // Start at 1 to skip the table header
            const title = rows[i].getElementsByClassName('project-title')[0].innerText.toLowerCase();
            const category = rows[i].getElementsByClassName('project-category')[0].innerText.toLowerCase();
            const description = rows[i].getElementsByClassName('project-description')[0].innerText.toLowerCase();
            const language = rows[i].getElementsByClassName('project-language')[0].innerText.toLowerCase();

            if (title.includes(searchValue) || category.includes(searchValue) || description.includes(searchValue) || language.includes(searchValue)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }


    });
</script>

@endsection

