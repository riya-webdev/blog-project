@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('content')

    <!-- Header -->
    <div class="admin-header">

        <div>
            <h1>Edit Blog</h1>
            <p>Update the information and content of your blog.</p>
        </div>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
            ← Back to Blogs
        </a>

    </div>


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


    <!-- Edit Form -->
    <div class="form-card">

        <form
            action="{{ route('blogs.update', $blog->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')


            <!-- Basic Information -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Basic Information</h2>

                    <p>
                        Update the main information about your blog.
                    </p>

                </div>


                <!-- Title -->
                <div class="form-group">

                    <label for="title">
                        Blog Title
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $blog->title) }}"
                        placeholder="Enter blog title"
                        required
                    >

                </div>


                <!-- Slug -->
                <div class="form-group">

                    <label for="slug">
                        Slug
                    </label>

                    <input
                        type="text"
                        id="slug"
                        name="slug"
                        value="{{ old('slug', $blog->slug) }}"
                        placeholder="example-my-blog-post"
                        required
                    >

                    <small>
                        Use a simple URL-friendly name.
                    </small>

                </div>


                <!-- Short Description -->
                <div class="form-group">

                    <label for="short_description">
                        Short Description
                    </label>

                    <textarea
                        id="short_description"
                        name="short_description"
                        rows="4"
                        placeholder="Write a short description..."
                        required
                    >{{ old('short_description', $blog->short_description) }}</textarea>

                </div>

            </div>


            <!-- Blog Content -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Blog Content</h2>

                    <p>
                        Update the complete content of your blog.
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
                    >{{ old('content', $blog->content) }}</textarea>

                </div>

            </div>


            <!-- Blog Image -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Blog Image</h2>

                    <p>
                        Replace the current image if required.
                    </p>

                </div>


                <div class="form-group">

                    <label for="image">
                        Featured Image
                    </label>


                    <!-- Current Image -->
                    @if($blog->image)

                        <div style="margin-bottom: 15px;">

                            <p style="margin-bottom: 8px; font-weight: 600;">
                                Current Image
                            </p>

                            <img
                                src="{{ asset('storage/' . $blog->image) }}"
                                alt="{{ $blog->title }}"
                                style="
                                    width: 220px;
                                    height: 140px;
                                    object-fit: cover;
                                    border-radius: 8px;
                                    border: 1px solid #ddd;
                                "
                            >

                        </div>

                    @endif


                    <!-- New Image -->
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
                            Choose a new image
                        </strong>

                        <span>
                            Leave empty to keep the current image
                        </span>

                    </div>

                </div>

            </div>


            <!-- Author -->
            <div class="form-section">

                <div class="form-section-header">

                    <h2>Author Information</h2>

                    <p>
                        Update the author details.
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
                        value="{{ old('author', $blog->author) }}"
                        placeholder="Enter author name"
                        required
                    >

                </div>

            </div>


            <!-- Actions -->
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
                    Update Blog
                </button>

            </div>

        </form>

    </div>

@endsection