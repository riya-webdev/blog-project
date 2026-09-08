
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Blog</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Home Page CSS -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body>


    <!-- =========================
         HEADER
    ========================== -->

    <header class="border-bottom bg-white">

        <nav class="navbar navbar-expand-lg">

            <div class="container">

                <!-- Logo -->

                <a href="/" class="navbar-brand fw-bold fs-4">
                    My Blog
                </a>


                <!-- Mobile Menu Button -->

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


                <!-- Navigation -->

                <div
                    class="collapse navbar-collapse"
                    id="mainNavbar"
                >

                    <ul class="navbar-nav ms-auto align-items-lg-center">

                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                href="/"
                            >
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{ url('/blogs') }}"
                            >
                                Blogs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#about"
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
         HERO SECTION
    ========================== -->

    <section class="hero-section">

        <div class="container">

            <div class="row align-items-center min-vh-75">

                <div class="col-lg-8">

              @if($hero)

    <p class="text-uppercase fw-bold text-secondary small mb-3">
        Welcome to My Blog
    </p>

    <h1 class="display-2 fw-bold mb-4">
        {{ $hero->title }}
    </h1>

    <p class="lead text-secondary mb-4 hero-description">
        {{ $hero->description }}
    </p>

    @if($hero->button_text)

        <a
            href="{{ $hero->button_link ?: '/blogs' }}"
            class="btn btn-dark btn-lg px-4"
        >
            {{ $hero->button_text }} →
        </a>

    @endif

@endif

                </div>

            </div>

        </div>

    </section>



    <!-- =========================
         LATEST BLOGS
    ========================== -->

    <section class="py-5">

        <div class="container">

            <!-- Section Heading -->

            <div class="row align-items-end mb-5">

                <div class="col-md-8">

                    <p class="text-uppercase text-secondary fw-bold small mb-2">
                        From The Blog
                    </p>

                    <h2 class="display-6 fw-bold mb-0">
                        Latest Articles
                    </h2>

                </div>


                <div class="col-md-4 text-md-end mt-3 mt-md-0">

                    <a
                        href="{{ url('/blogs') }}"
                        class="btn btn-outline-dark"
                    >
                        View All →
                    </a>

                </div>

            </div>


            <!-- Blog Cards -->

            <div class="row g-4">

                @forelse($blogs as $blog)

                    <div class="col-lg-4 col-md-6">

                        <article class="card blog-card h-100 border-0 shadow-sm">


                            <!-- Blog Image -->

                            @if($blog->image)

                                <img
                                    src="{{ asset('storage/' . $blog->image) }}"
                                    class="card-img-top blog-image"
                                    alt="{{ $blog->title }}"
                                >

                            @else

                                <div class="blog-image-placeholder">
                                    No Image
                                </div>

                            @endif


                            <!-- Blog Content -->

                            <div class="card-body p-4">

                                <!-- Author & Date -->

                                <div class="small text-secondary mb-2">

                                    <span>
                                        {{ $blog->author }}
                                    </span>

                                    <span class="mx-1">
                                        •
                                    </span>

                                    <span>
                                        {{ $blog->created_at->format('d M Y') }}
                                    </span>

                                </div>


                                <!-- Title -->

                                <h3 class="card-title h5 fw-bold">

                                    {{ $blog->title }}

                                </h3>


                                <!-- Description -->

                                <p class="card-text text-secondary">

                                    {{ $blog->short_description }}

                                </p>


                                <!-- Read More -->

                                <a
                                    href="{{ url('/blog/' . $blog->slug) }}"
                                    class="btn btn-dark btn-sm"
                                >
                                    Read More →
                                </a>

                            </div>

                        </article>

                    </div>


                @empty

                    <!-- No Blogs -->

                    <div class="col-12">

                        <div class="text-center py-5">

                            <h3 class="fw-bold">
                                No blogs available yet.
                            </h3>

                            <p class="text-secondary">
                                New articles will appear here soon.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </section>



    <!-- =========================
         ABOUT SECTION
    ========================== -->

@if($about)

    <section class="py-5 bg-light" id="about">

        <div class="container">

            <div class="row align-items-center g-5">

                <div class="col-lg-7">

                    <p class="text-uppercase text-secondary fw-bold small mb-2">
                        About
                    </p>

                    <h2 class="display-6 fw-bold mb-4">
                        {{ $about->title }}
                    </h2>

                    <p class="lead text-secondary">
                        {{ $about->description }}
                    </p>

                </div>

                @if($about->image)

                    <div class="col-lg-5">

                        <img
                            src="{{ asset('storage/' . $about->image) }}"
                            alt="{{ $about->title }}"
                            class="img-fluid rounded-3"
                        >

                    </div>

                @endif

            </div>

        </div>

    </section>

@endif



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
