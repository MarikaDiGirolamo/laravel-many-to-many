@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container my-3">
        <h1>Create New Item</h1>

        <div class="row g-4 py-4">
            <div class="col">
                <form action="{{ route('admin.projects.store') }}" method="post" class="need-validation">
                    @csrf

                    <label for="Title">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="type_id">Category</label>
                    <select class="form-control mb-4" name="type_id" id="type_id">
                        <option value="" selected disabled>Please select a category</option>
                        {{-- @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach --}}
                    </select>

                    <label>Content</label>
                    <textarea name="Content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="5"></textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="Image">Image</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                    @error('Image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="Link">Link</label>
                    <input class="form-control @error('link') is-invalid @enderror" type="text" name="Link">
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">

                    <div class="row g-4 py-5">
                        <div class="col">
                            <a href="{{ route('admin.projects.index') }}">Go back to Projects</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
