<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{route('loginUser')}}" method="POST">
        @csrf
        <section>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </section>
        <section>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </section>
        <button>login</button>
        <section>Create an account?
            <a href="/signup">SignUp</a>
        </section>
    </form>
</body>
</html>