@props(['title' => "Page Laravel"])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/style.css">

    <title>{{$title}}</title>

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
        {{$slot}}
    </main>
   


</body>

</html>
