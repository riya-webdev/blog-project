<!DOCTYPE html>
<html>
<head>
    <title>Add New Blog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <h1>Add New Blog</h1>

<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Title</label>
                <br>
                <input type="text" name="title" required>
            </div>

            <br>

            <div>
                <label>Slug</label>
                <br>
                <input type="text" name="slug" required>
            </div>

            <br>

            <div>
                <label>Short Description</label>
                <br>
                <textarea name="short_description" required></textarea>
            </div>

            <br>

            <div>
                <label>Content</label>
                <br>
                <textarea name="content" rows="8" required></textarea>
            </div>

            <br>

         <div>
    <label>Blog Image</label>
    <br>
    <input type="file" name="image" accept="image/*">
</div>
            <br>

            <div>
                <label>Author</label>
                <br>
                <input type="text" name="author" required>
            </div>

            <br>

            <button type="submit">
                Publish Blog
            </button>

        </form>

        <br>

        <a href="{{ route('blogs.index') }}">
            ← Back to Blogs
        </a>

    </div>

</body>
</html>