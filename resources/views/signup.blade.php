<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-300">
    <form action="{{route('signupUser')}}" method="POST" class="bg-white p-4 rounded-2xl shadow-lg w-80 space-y-6">
        @csrf

        <h1 class="font-bold text-2xl text-center">Sign Up</h1>
        <section class="space-1">
            <label class="block text-sm font-medium text-gray-700" for="name">Full Name</label>
            <input type="name" name="name" id="name" class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </section>
        <section class="space-1">
            <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </section>
        <section class="space-1">
            <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </section>
        <section class="space-1">
            <label class="block text-sm font-medium text-gray-700" for="password_confirmed">Password Again</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </section>
        <button class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">SignUp</button>
    </form>
</body>
</html>