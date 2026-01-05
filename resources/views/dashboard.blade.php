<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

    <h1>Hello {{ Auth::user()->name }}</h1>

    <h2>Supported Tasks</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <a href="{{ route('helpdesk') }}">Need support</a>

        <ol type="i">
            @foreach($departments as $department)
                <li>
                    <strong>Application Department: {{ $department->application_department }}</strong>
                    <p>Request task: {{ $department->supported_task }}</p>
                    <p>Task Status: {{ $department->task_status }}</p>
                </li>
            @endforeach
        </ol>

</body>
</html>
