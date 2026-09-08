<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $blog->title }} | My Blog</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Blog Detail CSS -->
    <link
        rel="stylesheet"
        href="{{ asset('css/blog-detail.css') }}"
    >

</head>

<body>


    <!-- =========================
         HEADER
    ========================== -->

    <header class="border-bottom bg-white">

        <nav class="navbar navbar-expand-lg">

            <div class="container">

                <a href="/" class="navbar-brand fw-bold fs-4">
                    My Blog
                </a>

                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >

                    <span class="navbar-toggler-icon"></span>

                </button>

                <div
                    class="collapse navbar-collapse"
                    id="mainNavbar"
                >

                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="/"
                            >
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                href="/blogs"
                            >
                                Blogs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="/#about"
                            >
                                About
                            </a>
                        </li>

                    </ul>

                </div>

            </div>

        </nav>

    </header>



    <!-- =========================
         BLOG DETAIL
    ========================== -->

    <main>

        <div class="container">

            <!-- Back Button -->

            <div class="blog-back">

                <a href="/blogs" class="back-link">
                    ← Back to Blogs
                </a>

            </div>


            <article class="blog-detail">


                <!-- Blog Header -->

                <div class="blog-header">

                    <div class="blog-meta">

                        <span>
                            {{ $blog->author }}
                        </span>

                        <span class="meta-separator">
                            •
                        </span>

                        <span>
                            {{ $blog->created_at->format('d M Y') }}
                        </span>

                    </div>


                    <h1 class="blog-title">
                        {{ $blog->title }}
                    </h1>


                    <p class="blog-description">
                        {{ $blog->short_description }}
                    </p>

                </div>



                <!-- Featured Image -->

                @if($blog->image)

                    <div class="blog-featured-image">

                        <img
                            src="{{ asset('storage/' . $blog->image) }}"
                            alt="{{ $blog->title }}"
                        >

                    </div>

                @endif



                <!-- Blog Content -->

                <div class="blog-content">

                    {!! nl2br(e($blog->content)) !!}

                </div>



                <!-- Bottom Navigation -->

                <div class="blog-footer">

                    <a
                        href="/blogs"
                        class="btn btn-outline-dark"
                    >
                        ← Back to All Blogs
                    </a>

                </div>


            </article>

        </div>

    </main>



    <!-- =========================
         FOOTER
    ========================== -->

    <footer class="bg-dark text-white py-4">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <h5 class="mb-0">
                        My Blog
                    </h5>

                </div>

                <div class="col-md-6 text-md-end mt-3 mt-md-0">

                    <p class="mb-0 text-secondary">
                        © {{ date('Y') }} My Blog.
                        All rights reserved.
                    </p>

                </div>

            </div>

        </div>

    </footer>



    <!-- Bootstrap JavaScript -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>

</body>

</html>