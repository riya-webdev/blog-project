@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')

<div class="admin-header">
    <div>
        <h1>Dashboard</h1>
        <p>Welcome to your blog admin panel.</p>
    </div>

    <a href="{{ route('blogs.create') }}" class="btn btn-primary">
        + Add New Blog
    </a>
</div>


<!-- Dashboard Cards -->

<div class="dashboard-cards">

    <div class="dashboard-card">
        <div class="dashboard-card-icon">📝</div>

        <div>
            <h3>{{ \App\Models\Blog::count() }}</h3>
            <p>Total Blogs</p>
        </div>
    </div>


    <div class="dashboard-card">
        <div class="dashboard-card-icon">✅</div>

        <div>
            <h3>{{ \App\Models\Blog::where('status', 'published')->count() }}</h3>
            <p>Published Blogs</p>
        </div>
    </div>


    <div class="dashboard-card">
        <div class="dashboard-card-icon">📅</div>

        <div>
            <h3>{{ \App\Models\Blog::whereDate('created_at', today())->count() }}</h3>
            <p>Blogs Today</p>
        </div>
    </div>

</div>


<!-- Recent Blogs -->

<div class="admin-card">

    <div class="admin-card-header">
        <h2>Recent Blogs</h2>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">
            View All
        </a>
    </div>

    @php
        $recentBlogs = \App\Models\Blog::latest()->take(5)->get();
    @endphp

    @if($recentBlogs->count())

        <div class="table-responsive">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($recentBlogs as $blog)

                        <tr>

                            <td>
                                <strong>{{ $blog->title }}</strong>
                            </td>

                            <td>
                                {{ $blog->author }}
                            </td>

                            <td>
                                <span class="status-badge {{ $blog->status }}">
                                    {{ ucfirst($blog->status) }}
                                </span>
                            </td>

                            <td>
                                {{ $blog->created_at->format('d M Y') }}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-state">
            <p>No blogs have been created yet.</p>

            <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                Create Your First Blog
            </a>
        </div>

    @endif

</div>

@endsection

