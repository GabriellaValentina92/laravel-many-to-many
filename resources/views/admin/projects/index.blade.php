@extends('admin.layouts.base')

@section('contents')
<h1>PROJECTS</h1>

{{-- @if (session('delete_success'))
    @php $project = session('delete_success') @endphp
    <div class="alert alert-danger">
        La project "{{ $project->titolo }}" è stata eliminata
        <form
            action="{{ route("admin.projects.restore", ['project' => $project]) }}"
                method="project"
                class="d-inline-block"
            >
            @csrf
            <button class="btn btn-warning">Ripristina</button>
        </form>
    </div>
@endif

@if (session('restore_success'))
    @php $project = session('restore_success') @endphp
    <div class="alert alert-success">
        La project "{{ $project->titolo }}" è stata ripristinata
    </div>
@endif --}}

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">type</th>
            <th scope="col">technologies</th>
            <th scope="col">url_github</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->title }}</td>
                <td><a href="{{route('admin.types.show', ['type' => $project->type])}}">{{ $project->type->project_type }}</a></td>
                <td>
                    @foreach ($project->technologies as $technology)
                        <a href="{{route('admin.technologies.show', ['technology' => $technology])}}">{{$technology->name}}</a>{{ !$loop->last ? ',' : '' }}
                    @endforeach
                </td>
                <td>{{ $project->url_github }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.projects.show', ['project' => $project->id]) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">Edit</a>
                    
                    <form
                        action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                        method="post"
                        class="d-inline-block"
                    >
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $projects->links() }}
@endsection