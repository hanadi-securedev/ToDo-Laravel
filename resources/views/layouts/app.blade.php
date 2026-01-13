<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Todo App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbarr">
        <div class="nav-content">
        <p style="color:#ffff;">ToDoApp</p>
        <div class="nav-links">
        <a class="nav-link" href="/">Home</a>
        <a class="nav-link" href="/todo">Todos</a>
        </div>
        </div>
    </nav>
    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Todo App</p>
    </footer>
</body>
   <script src="{{ asset('js/todos.js') }}"></script>

</html>
