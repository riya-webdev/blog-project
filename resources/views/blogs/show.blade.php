<!DOCTYPE html>
<html>
<head>
    <title>{{ $blog->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <a href="/blogs" class="back-link">← Back to Blogs</a>

        <article class="blog-detail">

            <h1>{{ $blog->title }}</h1>

            <p class="author">
                By {{ $blog->author }}
                | {{ $blog->created_at->format('d M Y') }}
            </p>

            @if($blog->image)
                <img
                    src="{{ $blog->image }}"
                    alt="{{ $blog->title }}"
                    class="blog-image"
                >
            @endif

            <h3>{{ $blog->short_description }}</h3>

            <div class="blog-content">
                {{ $blog->content }}
            </div>

        </article>

    </div>

</body>
</html>