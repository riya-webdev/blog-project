<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Blog Admin')</title>

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@yield('styles')    

</head>

<body>

<div class="admin-layout">

    <!-- Sidebar -->
    <aside class="admin-sidebar">

        <div class="sidebar-logo">
            Blog Admin
        </div>

        <!-- <nav class="sidebar-nav">

            <a href="/admin">
                <span class="sidebar-icon">📊</span>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('blogs.index') }}">
                <span class="sidebar-icon">📝</span>
                <span>All Blogs</span>
            </a>

            <a href="{{ route('blogs.create') }}">
                <span class="sidebar-icon">➕</span>
                <span>Add Blog</span>
            </a>

            <a href="/blogs" target="_blank">
                <span class="sidebar-icon">🌐</span>
                <span>View Website</span>
            </a>

        </nav> -->
        <nav class="sidebar-nav">

    <a href="/admin">
        <span class="sidebar-icon">📊</span>
        <span>Dashboard</span>
    </a>

    <a href="{{ route('blogs.index') }}">
        <span class="sidebar-icon">📝</span>
        <span>Blogs</span>
    </a>

</nav>

        <!-- Logout -->
        <div class="sidebar-logout">

            <form action="/admin/logout" method="POST">

                @csrf

                <button type="submit">
                    🚪 Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- Main Content -->
    <main class="admin-main">

        @yield('content')

    </main>

</div>

</body>

</html>