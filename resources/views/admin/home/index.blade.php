@extends('admin.layouts.app')

@section('title', 'Home Page Settings')

@section('styles')

<link
    rel="stylesheet"
    href="{{ asset('css/home-admin.css') }}"
>

@endsection
@section('content')

<div class="admin-header">

    <div>
        <h1>Home Page</h1>
        <p>Manage the content displayed on your website home page.</p>
    </div>

</div>


@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


@if($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif



<!-- =========================
     HERO SECTION
========================= -->

<div class="admin-card mb-4">

    <div class="admin-card-header">

        <div>
            <h2>Hero Section</h2>

            <p class="text-secondary mb-0">
                Manage the main section of your home page.
            </p>
        </div>

    </div>


    <form
        action="{{ route('admin.home.update', 'hero') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="mb-3">

            <label class="form-label">
                Heading
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $hero->title ?? '') }}"
                placeholder="Enter hero heading"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                class="form-control"
                rows="4"
                placeholder="Enter hero description"
            >{{ old('description', $hero->description ?? '') }}</textarea>

        </div>


        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Button Text
                </label>

                <input
                    type="text"
                    name="button_text"
                    class="form-control"
                    value="{{ old('button_text', $hero->button_text ?? '') }}"
                    placeholder="Example: Explore Blogs"
                >

            </div>


            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Button Link
                </label>

                <input
                    type="text"
                    name="button_link"
                    class="form-control"
                    value="{{ old('button_link', $hero->button_link ?? '') }}"
                    placeholder="Example: /blogs"
                >

            </div>

        </div>


        <div class="mb-4">

            <label class="form-label">
                Hero Image
            </label>

            <input
                type="file"
                name="image"
                class="form-control"
                accept=".jpg,.jpeg,.png,.webp"
            >

        </div>


        @if($hero && $hero->image)

            <div class="mb-4">

                <p class="mb-2">
                    Current Image:
                </p>

                <img
                    src="{{ asset('storage/' . $hero->image) }}"
                    alt="Hero Image"
                    style="width: 250px; height: 140px; object-fit: cover; border-radius: 8px;"
                >

            </div>

        @endif


        <button
            type="submit"
            class="btn btn-primary"
        >
            Save Hero Section
        </button>

    </form>

</div>



<!-- =========================
     ABOUT SECTION
========================= -->

<div class="admin-card">

    <div class="admin-card-header">

        <div>
            <h2>About Section</h2>

            <p class="text-secondary mb-0">
                Manage the About section of your home page.
            </p>
        </div>

    </div>


    <form
        action="{{ route('admin.home.update', 'about') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')


        <div class="mb-3">

            <label class="form-label">
                Heading
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $about->title ?? '') }}"
                placeholder="Enter about heading"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                class="form-control"
                rows="5"
                placeholder="Enter about description"
            >{{ old('description', $about->description ?? '') }}</textarea>

        </div>


        <div class="mb-4">

            <label class="form-label">
                About Image
            </label>

            <input
                type="file"
                name="image"
                class="form-control"
                accept=".jpg,.jpeg,.png,.webp"
            >

        </div>


        @if($about && $about->image)

            <div class="mb-4">

                <p class="mb-2">
                    Current Image:
                </p>

                <img
                    src="{{ asset('storage/' . $about->image) }}"
                    alt="About Image"
                    style="width: 250px; height: 140px; object-fit: cover; border-radius: 8px;"
                >

            </div>

        @endif


        <button
            type="submit"
            class="btn btn-primary"
        >
            Save About Section
        </button>

    </form>

</div>

@endsection