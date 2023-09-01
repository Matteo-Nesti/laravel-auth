@extends('layouts.app')

@section('title', 'Edit Project')



@section('content')
    <form class="mt-3 row" method="POST" action="{{ route('admin.projects.update', $project) }}">
        @csrf
        @method('PUT')

        <div class="mb-3 col-6">
            <label for="title" class="form-label">Edit Title</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title"
                value="{{ $project->title }}">
        </div>
        <div class="mb-3 col-6">
            <label for="slug" class="form-label">Slug Title</label>
            <input type="text" class="form-control" id="slug" aria-describedby="emailHelp" name="slug"
                value="{{ $project->slug }}" readonly>
        </div>
        {{-- img prev --}}
        <div class="mb-3 col-10">
            <label for="thumb-field" class="form-label">Thumb</label>
            <input type="text" class="form-control" id="thumb-field" aria-describedby="emailHelp" name="image"
                value="{{ $project->image }}">
        </div>
        <div class="col-2">
            <img src="{{ $project->image }}" class="img-fluid" alt="Prview" id="thumb-preview">
        </div>
        {{--  --}}
        <div class="mb-3 col-12">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea class="form-control" rows="6"aria-label="With textarea" name="content">{{ $project->content }}</textarea>
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
