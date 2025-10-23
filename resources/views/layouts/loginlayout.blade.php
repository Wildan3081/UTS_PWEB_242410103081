<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col justify-between">

    @include('components.loginheader')

    <main class="flex-grow flex items-center justify-center">
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
