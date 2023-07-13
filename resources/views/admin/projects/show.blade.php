@extends('admin.layouts.base')

@section('contents')

    <h1>{{ $project->title }}</h1>
    <h3>Category: {{$project->type->project_type}}</h3>
    <h4>Technologies/Frameworks used: {{implode(',', $project->technologies->pluck('name')->all())}}</h4>
    {{-- <img src="{{ $project->project_image }}" alt="{{ $project->project_image }}"> --}}
    @if($project->img_file)
        <img src="{{asset('storage/' . $project->img_file)}}" alt="{{ $project->title }}">
    @endif
    <p>{{ $project->project_description }}</p>
    <div>Per andare alla repository del progetto <a href="https://github.com/GabriellaValentina92?tab=repositories">Clicca qui</a></div>
    <a class="btn btn-primary" href="{{route('admin.projects.edit', ['project' => $project->id ])}}">Edit</a>

@endsection