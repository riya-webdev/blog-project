@extends('admin.layouts.app')

@section('title', 'Blog Management')

@section('content')

    <!-- Header -->

    <div class="admin-header">

        <div>

            <h1>Blog Management</h1>

            <p>
                Manage your blogs, content and publications.
            </p>

        </div>

        <a
            href="{{ route('blogs.create') }}"
            class="btn btn-primary"
        >
            + Add New Blog
        </a>

    </div>


    <!-- Success Message -->

    @if(session('success'))

        <div class="alert-success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Blog Table -->

    <div class="blog-table-wrapper">

        <table class="blog-table">

            <thead>

                <tr>

                    <th>Image</th>
                    <th>Blog</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>

                </tr>

            </thead>


            <tbody>

                @forelse($blogs as $blog)

                    <tr>

                        <!-- Image -->

                        <td>

                            @if($blog->image)

                                <img
                                    src="{{ asset('storage/' . $blog->image) }}"
                                    alt="{{ $blog->title }}"
                                    class="admin-blog-image"
                                >

                            @else

                                <div class="no-image">
                                    No Image
                                </div>

                            @endif

                        </td>


                        <!-- Blog -->

                        <td>

                            <div class="blog-title">
                                {{ $blog->title }}
                            </div>

                            <div class="blog-description">
                                {{ Str::limit($blog->short_description, 70) }}
                            </div>

                        </td>


                        <!-- Author -->

                        <td>
                            {{ $blog->author }}
                        </td>


                        <!-- Status -->

                        <td>

                            @if($blog->status === 'published')

                                <span class="status status-published">
                                    Published
                                </span>

                            @else

                                <span class="status status-draft">
                                    Draft
                                </span>

                            @endif

                        </td>


                        <!-- Date -->

                        <td>
                            {{ $blog->created_at->format('d M Y') }}
                        </td>


                        <!-- Actions -->

                        <td>

                            <div class="action-buttons">

                                <a
                                    href="{{ route('blogs.edit', $blog->id) }}"
                                    class="btn btn-edit"
                                >
                                    Edit
                                </a>


                                <form
                                    action="{{ route('blogs.destroy', $blog->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this blog?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            style="text-align:center; padding:40px;"
                        >

                            No blogs found.

                            <br><br>

                            <a
                                href="{{ route('blogs.create') }}"
                                class="btn btn-primary"
                            >
                                + Create Your First Blog
                            </a>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection