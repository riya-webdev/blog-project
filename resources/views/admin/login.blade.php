<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

<link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="login-page">

    <div class="login-container">

        <!-- Left Side -->
        <div class="login-brand">

            <div class="brand-logo">
                B
            </div>

            <h1>Admin</h1>

            <p>
                Manage your content, publish new blogs,
                and keep your website up to date.
            </p>

            <div class="brand-features">

                <div>
                    <span>✓</span>
                    <p>Manage your blogs</p>
                </div>

                <div>
                    <span>✓</span>
                    <p>Upload blog images</p>
                </div>

                <div>
                    <span>✓</span>
                    <p>Publish & update content</p>
                </div>

            </div>

        </div>


        <!-- Right Side -->
        <div class="login-form-container">

            <div class="login-form-header">

                <h2>Welcome back</h2>

                <p>
                    Sign in to access your admin dashboard.
                </p>

            </div>


            @if($errors->any())

                <div class="login-error">

                    {{ $errors->first() }}

                </div>

            @endif


            <form action="/admin/login" method="POST">

                @csrf


                <!-- Email -->
                <div class="login-input-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="admin@example.com"
                        required
                    >

                </div>


                <!-- Password -->
                <div class="login-input-group">

                    <div class="password-label">

                        <label for="password">
                            Password
                        </label>

                        <a href="#">
                            Forgot password?
                        </a>

                    </div>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <!-- Remember -->
                <div class="remember-me">

                    <label>

                        <input
                            type="checkbox"
                            name="remember"
                        >

                        <span>Remember me</span>

                    </label>

                </div>


                <!-- Login Button -->
                <button
                    type="submit"
                    class="login-submit"
                >
                    Sign In
                </button>

            </form>


            <div class="login-back">

                <a href="/blogs">
                    ← Back to website
                </a>

            </div>

        </div>

    </div>

</div>

</body>

</html>
```
