<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>

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
    <h2 class="my-2">Supported Requests</h2>
        <ol type="i">
            @foreach($departments as $department)
                <li class="border border-black">
                    <strong>Application Department: {{ $department->application_department }}</strong>
                    <p>Request task: {{ $department->supported_task }}</p>
                    <form action="{{ route('department.updateStatus', $department->application_id) }}" 
                    method="POST" class="mt-2">
                    @csrf
                    @method('PUT')

                    <select name="task_status" class="border p-1">
                        <option value="Pending" {{$department->task_status == 'Pedding' ? 'selected' : ''}}>
                            Pedding
                        </option>
                        <option value="In Progress" {{$department->task_status == 'In Progress' ? 'selected' : ''}}>
                            In Progress
                        </option>
                        <option value="Completed" {{$department->task_status == 'Completed' ? 'selected' : ''}}>
                            Completed
                        </option>
                    </select>

                    <input type="text" placeholder="Comment" name="comments" id="comment" value="{{ $department->comments }}" class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">

                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 ml-2">Update</button>
                </form>

                {{-- <form action="{{ route('department.updateComment', $department->application_id) }}" 
                    method="POST" class="mt-2">
                    @csrf
                    @method('PUT')
                    <input type="text" placeholder="Comment" name="comments" id="comment" class="w-full px-4 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 ml-2">Update</button>
                </form> --}}
                </li>
            @endforeach
        </ol>
        </section>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>
