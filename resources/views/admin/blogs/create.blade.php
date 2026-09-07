@extends('admin.layouts.app')

@section('title', 'Add New Blog')

@section('content')

    <!-- Header -->
    <div class="admin-header">

        <div>
            <h1>Add New Blog</h1>
            <p>Create and publish a new blog post.</p>
        </div>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
            ← Back to Blogs
        </a>

    </div>


    <!-- Success Message -->
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Validation Errors -->
    @if($errors->any())

        <div class="alert alert-error">

            <strong>Please fix the following errors:</strong>

            <ul>

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <!-- Blog Form -->
    <div class="form-card">

        <form
            action="{{ route('blogs.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <!-- Basic Information -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Basic Information</h2>

                    <p>
                        Enter the main information about your blog.
                    </p>

                </div>


                <div class="form-group">

                    <label for="title">
                        Blog Title
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter blog title"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="slug">
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug') }}"
                        placeholder="example-my-blog-post"
                        required
                    >

                    <small>
                        Use a simple URL-friendly name.
                    </small>

                </div>


                <div class="form-group">

                    <label for="short_description">
                        Short Description
                    </label>

                    <textarea
                        id="short_description"
                        name="short_description"
                        rows="4"
                        placeholder="Write a short description of your blog..."
                        required
                    >{{ old('short_description') }}</textarea>

                </div>

            </div>


            <!-- Blog Content -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Blog Content</h2>

                    <p>
                        Write the complete content of your blog.
                    </p>

                </div>


                <div class="form-group">

                    <label for="content">
                        Content
                    </label>

                    <textarea
                        id="content"
                        name="content"
                        rows="12"
                        placeholder="Write your blog content here..."
                        required
                    >{{ old('content') }}</textarea>

                </div>

            </div>


            <!-- Blog Image -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Blog Image</h2>

                    <p>
                        Upload an image for your blog.
                    </p>

                </div>


                <div class="form-group">

                    <label for="image">
                        Featured Image
                    </label>

                    <div class="image-upload-box">

                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                        >

                        <div class="upload-icon">
                            🖼️
                        </div>

                        <strong>
                            Choose an image
                        </strong>

                        <span>
                            JPG, JPEG, PNG or WEBP — Max 2MB
                        </span>

                    </div>

                </div>

            </div>


            <!-- Author -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Author Information</h2>

                    <p>
                        Enter the author details.
                    </p>

                </div>


                <div class="form-group">

                    <label for="author">
                        Author Name
                    </label>

                    <input
                        type="text"
                        id="author"
                        name="author"
                        value="{{ old('author', 'Admin') }}"
                        placeholder="Enter author name"
                        required
                    >

                </div>

            </div>


            <!-- Form Actions -->
            <div class="form-actions">

                <a
                    href="{{ route('blogs.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Publish Blog
                </button>

            </div>


        </form>

    </div>

@endsection