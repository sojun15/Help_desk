<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-black text-white">

    <h1 class="flex flex-row justify-center text-yellow-400 my-2">Daffodil to daffodil software</h1>
    <section class="flex flex-row justify-between items-center space-y-2">
    <h1 class="font-bold text-2xl">Hello {{ Auth::user()->name }}</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-600 text-white p-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Logout
        </button>
    </form>
</section>

    <section class="space-y-2">
    <a href="{{ route('helpdesk') }}" class="bg-green-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">Need support</a>
    </section>

    <section class="space-y-2">
    <h2 class="my-2">Supported Tasks</h2>
        <ol type="i">
            @foreach($departments as $department)
                <li class="border border-white">
                    <strong>Application Department: {{ $department->application_department }}</strong>
                    <p>Request task: {{ $department->supported_task }}</p>
                    <p>Task Status: <strong class="bg-blue-600 text-white">{{ $department->task_status }}</strong></p>
                    @if($department->comments)
                    <p class="text-red-400">Comments: {{$department->comments}}</p>
                    @endif
                </li>
            @endforeach
        </ol>
    </section>
</body>
</html>
