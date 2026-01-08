<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supporting request Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <section class="flex justify-end bg-gray-300">
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-600 text-white p-2 rounded-lg font-semibold hover:bg-blue-700">
            Logout
        </button>
    </form>
    </section>
    <section class="min-h-screen flex flex-col items-center justify-center bg-gray-300">
    <form action="{{route('helpdesk_form')}}" method="POST" class="bg-white p-8 rounded-2xl shadow-lg w-80 space-y-6">
        <h1 class="font-bold text-xl text-center">welcome to Daffodil Support Center</h1>
        @csrf

        <section class="space-y-2">
            <label class="block text-sm font-medium text-gray-700" for="application_department">Application Department</label>
            <input type="text" name="application_department" id="application_department" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </section>
        <section class="space-y-2">
            <label class="block text-sm font-medium text-gray-700" for="supported_task">Supported Task Request</label>
            <input type="text" name="supported_task" id="supported_task" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </section>
        <button class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Submit</button>
    </form>
    </section>

    @if($errors->any())
    <div>
        <ol>
            @foreach ($errors->all() as $error)
                <ul>{{$error}}</ul>
            @endforeach
        </ol>
    </div>
    @endif
</body>
</html>