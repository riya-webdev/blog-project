<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">

        <h1>My Blogs</h1>

        <div class="blog-grid">

            @foreach($blogs as $blog)

                <article class="blog-card">

                @if($blog->image)
    <img
        src="{{ asset('storage/' . $blog->image) }}"
        alt="{{ $blog->title }}"
        class="blog-image"
    >
@endif

                    <h2>
                        <a href="/blog/{{ $blog->slug }}">
                            {{ $blog->title }}
                        </a>
                    </h2>

                    <p class="description">
                        {{ $blog->short_description }}
                    </p>

                    <p class="author">
                        By {{ $blog->author }}
                    </p>

                    <a class="read-more" href="/blog/{{ $blog->slug }}">
                        Read More →
                    </a>

                </article>

            @endforeach

        </div>

    </div>

</body>
</html>