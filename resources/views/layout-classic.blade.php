
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/style.css">

    <title>@yield('title','Page Title')</title>

</head>

<body>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">Contact</a>
        </nav>
    </header>
    <main>
       @yield('content')
    </main>
   


</body>

</html>
