<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="bg-white relative" style="min-height: 100vh">

    @include('includes.navbar')

    <main style="min-height: 80vh">
        @yield('user-content')
    </main>

    @include('includes.footer')

</body>
</html>
