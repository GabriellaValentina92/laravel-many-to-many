@extends('admin.layouts.base')

@section('contents')
<h1>tYPES</h1>

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
            <th scope="col">Project_type</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
            <tr>
                <th scope="row">{{ $type->id }}</th>
                <td>{{ $type->project_type }}</td>
                {{-- <td>{{ $type->description }}</td> --}}
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.types.show', ['type' => $type->id]) }}">View</a>
                    <a class="btn btn-warning" href="{{ route('admin.types.edit', ['type' => $type->id]) }}">Edit</a>
                    
                    <form
                        action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
                        method="type"
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
@endsection