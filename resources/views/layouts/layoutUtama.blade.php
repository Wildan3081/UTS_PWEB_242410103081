<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PupukKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex flex-col justify-between">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
</body>
</html>
