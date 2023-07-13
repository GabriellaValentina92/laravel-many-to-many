@extends('admin.layouts.base')

@section('contents')
<div class="container-create">
  <h1>Insert a New Project</h1>

    <form method="POST" action="{{ route('admin.projects.store') }}" class="form-create" enctype="multipart/form-data">
        {{-- input nascosto che arriva al server --}}
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            <div class="invalid-feedback">
            @error('title') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select @error('type_id') is-invalid @enderror" aria-label="Default select example" id="type" name="type_id">
                {{-- <option selected>Open this select menu</option>                --}}
                @foreach ($types as $type){
                    <option value="{{$type->id}}">{{$type->project_type}}</option>
                }
                <div class="invalid-feedback">
                    @error('type_id') {{ $message }} @enderror
                    </div> 
                @endforeach
            </select>
        </div> 
        
        <div class="mb-3">
            <h3>Technologies</h3>
            @foreach($technologies as $technology)
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="technology{{$technology->id}}" name="technologies[]" value="{{$technology->id}}"  @if (in_array($technology->id, old('technologies', []))) checked @endif>
                    <label class="form-check-label" for="technology{{$technology->id}}">{{$technology->name}}</label>
                </div>
            @endforeach    
            {{-- <div class="invalid-feedback">
                @error('type_id') {{ $message }} @enderror
            </div>  --}}    
        </div> 

        <div class="mb-3">
            <label for="project_image" class="form-label">image url</label>
            <input type="url" class="form-control @error('project_image') is-invalid @enderror" id="project_image" rows="3" name="project_image" value="{{ old('project_image') }}">
            <div class="invalid-feedback">
                @error('project_image') {{ $message }} @enderror
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control @error('img_file') is-invalid @enderror" id="image" name="img_file" accept="image/*">
            <label class="input-group-text" for="image">Upload</label>
            <div class="invalid-feedback">
                @error('img_file') {{ $message }} @enderror
            </div>
          </div>

        <div class="mb-3">
            <label for="url_github" class="form-label">url_github</label>
            <input type="url" class="form-control @error('url_github') is-invalid @enderror" id="url_github" name="url_github" value="{{ old('url_github') }}">
            <div class="invalid-feedback">
                @error('url_github') {{ $message }} @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="project_description" class="form-label">project_description</label>
            <textarea class="form-control @error('project_description') is-invalid @enderror" id="project_description" name="project_description" cols="30" rows="10"> {{ old('project_description') }} </textarea>
            <div class="invalid-feedback">
                @error('project_description') {{ $message }} @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
      
  @endsection
</div>