@extends('admin.layouts.base')

@section('contents')
<div class="container-create">
  <h1>Insert a New Type</h1>

    <form method="POST" action="{{ route('admin.types.store') }}" class="form-create">
        {{-- input nascosto che arriva al server --}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            <div class="invalid-feedback">
            @error('name') {{ $message }} @enderror
            </div>
        </div>    

        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" cols="30" rows="10"> {{ old('description') }} </textarea>
            <div class="invalid-feedback">
                @error('description') {{ $message }} @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
  @endsection
</div>