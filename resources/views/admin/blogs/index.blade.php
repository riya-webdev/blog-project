<!DOCTYPE html>
<html>
<head>
    <title>Admin - Blogs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <h1>Admin - Manage Blogs</h1>

        <a href="{{ route('blogs.create') }}">
            + Add New Blog
        </a>

        <br><br>

        @foreach($blogs as $blog)

            <article class="blog-card">

                <h2>{{ $blog->title }}</h2>

                <p>{{ $blog->short_description }}</p>

                <p>
                    Author: {{ $blog->author }}
                </p>

                <a href="{{ route('blogs.edit', $blog->id) }}">
                    Edit
                </a>

                <form
                    action="{{ route('blogs.destroy', $blog->id) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>

            </article>

        @endforeach

    </div>

</body>
</html>