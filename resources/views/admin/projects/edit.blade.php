@extends('layouts.app')

@section('title', 'Edit Project')


@section('content')
    {{-- form --}}
    @include('includes.projects.form')
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
