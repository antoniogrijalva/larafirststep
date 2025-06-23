<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <title>Sistema: Curso</title>
</head>
<body>
    <div class="container-fluid mt-5">
        <header>
            <h1>Curso de Laravel 12</h1>
            <nav class="text-white p-3">
            ENCABEZADO...
            </nav>
        </header>
        
        <section class="fondo_a mt-2 shadow">
            @yield('content')
        </section>
       
        @yield('morecontent')
        
    </div>
</body>
</html>
<style>
    .fondo_a{
        background-color: #9bbbe2;
        padding: 15px;
        border-radius: 15px;
        border: #b3bfc9 solid 1px;
    }
    header{
        background-color: #446c8b;
        color: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
