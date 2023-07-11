@extends('admin.layouts.base')

@section('contents')
    <h1>Category: {{$type->project_type}}</h1>
    <p>{{ $type->description }}</p>
    <div>Per andare alla repository del progetto <a href="https://github.com/GabriellaValentina92?tab=repositories">Clicca qui</a></div>
    <a class="btn btn-primary" href="{{route('admin.types.edit', ['type' => $type->id ])}}">Edit</a>

    <h3>Type of Project:</h3>
    <ul>
        @foreach ($type->projects as $project)
        <li><a href="{{route('admin.projects.show', ['project' => $project])}}">{{$project->title}}</a></li>  
        @endforeach

    </ul>

@endsection