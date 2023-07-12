@extends('admin.layouts.base')

@section('contents')
<h1>tYPES</h1>

@if (session('types_delete_success'))
    @php $type = session('types_delete_success') @endphp
    <div class="alert alert-danger">
        This type "{{ $type->name }}" has been deleted
    </div>
@endif
        {{-- <form
            action="{{ route("admin.projects.restore", ['type' => $type]) }}"
                method="project"
                class="d-inline-block"
            >
            @csrf
            <button class="btn btn-warning">Ripristina</button>
        </form> --}}

{{-- @if (session('restore_success'))
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
@endsection