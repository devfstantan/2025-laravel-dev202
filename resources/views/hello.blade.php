<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hello DEV202</h1>

    <h2>Login Form</h2>
    <form action="/login" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="password" name="pwd">
        <input type="submit" value="Login">
    </form>

    {{-- Links --}}
    <h2>Links by route path</h2>
    <a href="{{ url('/products/123') }}">Product 123</a>
    <a href="{{ url('/products/123/images/22') }}">Image 22 of Product 123</a>
    <a href="{{ url('/products/123/share/facebook') }}">Share Product 123 in Facebook</a>

    <h2>Links by route name:</h2>
    <a href="{{ route('products.show', ['id' => 123]) }}">Product 123</a>
    <a href="{{ route('products.image', ['productId' => 123, 'imageId' => 22]) }}">Image 22 of Product 123
    </a>
</body>

</html>
