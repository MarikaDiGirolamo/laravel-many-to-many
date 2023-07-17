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
        <h1>Modify Item</h1>
        <div class="row g-4 py-4">
            <div class="col">
                <form action="{{ route('admin.projects.update', $project) }}" method="post" class="need-validation"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <label for="Title">Title</label>
                    <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                        value="{{ $project->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="Content">Content</label>
                    <input class="form-control @error('content') is-invalid @enderror" type="text" name="content"
                        value="{{ $project->content }}">
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <label for="Link">Link</label>
                    <input class="form-control @error('link') is-invalid @enderror" type="text" name="link"
                        value="{{ $project->link }}">
                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @foreach ($technologies as $i => $technology)
                        <div class="form-check">
                            <input type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                                id="technologies{{ $i }}" class="form-check-input">
                            <label for="technologies{{ $i }}"
                                class="form-check-label">{{ $technology->name }}</label>
                        </div>
                    @endforeach


                    <label for="Image">Image</label>
                    @if ($project->image)
                        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}">
                    @endif
                    <input class="form-control @error('img') is-invalid @enderror" type="file" name="image">
                    @error('Image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <input class="form-control mt-4 btn btn-primary" type="submit" value="Invia">
                </form>

                <form id="form" action="{{ route('admin.projects.destroy', $project) }}">
                    @csrf
                    @method('DELETE')
                    <input onclick="confirmDelete()" class="form-control mt-4 btn btn-danger" type="submit" value="Cancel">
                </form>

                <div class="row g-4 py-5">
                    <div class="col">
                        <a href="{{ route('admin.projects.index') }}">Go back to Projects</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete() {
            let r = confirm("Are you sure you want to discard this item??");
            if (r) {
                document.getElementById("form").submit();
            }
        }
    </script>
@endsection
