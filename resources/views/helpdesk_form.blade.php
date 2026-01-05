<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application Form</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="{{route('helpdesk_form')}}" method="POST">
        @csrf
        <section>
            <label for="application_department">Application Department</label>
            <input type="text" name="application_department" id="application_department">
        </section>
        <section>
            <label for="supported_task">Supported Task Request</label>
            <input type="text" name="supported_task" id="supported_task">
        </section>
        <button>Submit</button>
    </form>
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