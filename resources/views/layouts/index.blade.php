<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>

    <header class="mb-5">
        @include('includes.navbar')
    </header>

    <main class="container mt-5">
        @yield('content')
    </main>

    @include('includes.footer')
</body>
</html>
