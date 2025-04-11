<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema: Curso</title>
</head>
<body>
    <header>
        <h1>Curso de Laravel 10</h1>
        <nav class="bg-dark text-white p-3">
           ENCABEZADO...
        </nav>
    </header>
    @yield('content')
    <section class="fondo_a">
        @yield('morecontent')
    </section>
</body>
</html>
<style>
    .fondo_a{
        background-color: #f0f0f0;
        padding: 20px;
    }
    header{
        background-color: #adafa7;
        color: white;
        padding: 20px;
    }   
</style>
