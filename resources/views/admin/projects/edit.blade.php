@extends('layouts.app')

@section('title', 'Edit Project')


@section('content')
    <form class="mt-3 row" method="POST" action="{{ route('admin.projects.update', $project) }}">
        @csrf
        @method('PUT')

        <div class="mb-3 col-6">
            <label for="title" class="form-label">Edit Title</label>
            <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                aria-describedby="emailHelp" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3 col-6">
            <label for="slug" class="form-label">Slug Title</label>
            <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name="slug"
                value="{{ old('slug', $project->slug) }}" readonly>
        </div>
        {{-- img prev --}}
        <div class="mb-3 col-10">
            <label for="thumb-field" class="form-label">Thumb</label>
            <input type="text" class="form-control @error('image') is-invalid @enderror" id="thumb-field"
                aria-describedby="emailHelp" name="image" value="{{ old('image', $project->image) }}">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-2">
            <img src="{{ $project->image }}" class="img-fluid" alt="Prview" id="thumb-preview">
        </div>
        {{--  --}}
        <div class="mb-3 col-12">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control @error('content') is-invalid @enderror" rows="6"aria-label="With textarea"
                name="content">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-3 ">
            <button class="btn btn-warning">
                Edit Project
            </button>
        </div>
    </form>
@endsection

@section('script')
    @vite('resources/js/thumb-preview.js')

    <script>
        const title = document.getElementById('title')
        const slug = document.getElementById('slug')

        title.addEventListener('input', () => {

            if (title) {
                slug.value = title.value.trim().replace(/\s+/g, '-').toLowerCase()
            }

        })
    </script>
@endsection
