<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="bg-white">

    <div class="row w-100">
        <div style="width: 28%">
            @include('includes.sidebar')
        </div>

        <main style="width: 72%">
            @include('includes.header')
            @yield('content')
        </main>
    </div>

</body>
</html>
