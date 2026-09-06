<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <h1>Edit Blog</h1>

<form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label>Title</label>
                <br>
                <input
                    type="text"
                    name="title"
                    value="{{ $blog->title }}"
                    required
                >
            </div>

            <br>

            <div>
                <label>Slug</label>
                <br>
                <input
                    type="text"
                    name="slug"
                    value="{{ $blog->slug }}"
                    required
                >
            </div>

            <br>

            <div>
                <label>Short Description</label>
                <br>
                <textarea name="short_description" required>{{ $blog->short_description }}</textarea>
            </div>

            <br>

            <div>
                <label>Content</label>
                <br>
                <textarea name="content" rows="8" required>{{ $blog->content }}</textarea>
            </div>

            <br>

            <div>
                <label>Blog Image</label>
<br>

<input
    type="file"
    name="image"
    accept="image/*"
>

@if($blog->image)
    <br><br>
    <img
        src="{{ asset('storage/' . $blog->image) }}"
        alt="{{ $blog->title }}"
        width="200"
    >
@endif
            </div>

            <br>

            <div>
                <label>Author</label>
                <br>
                <input
                    type="text"
                    name="author"
                    value="{{ $blog->author }}"
                    required
                >
            </div>

            <br>

            <button type="submit">
                Update Blog
            </button>

        </form>

        <br>

        <a href="{{ route('blogs.index') }}">
            ← Back to Blogs
        </a>

    </div>

</body>
</html>