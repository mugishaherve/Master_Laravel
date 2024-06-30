<!-- resources/views/customers/create.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Create Customer</title>
</head>

<body>
    <h1>Create Customer</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label for="firstname">Firstname:</label>
        <input type="text" name="firstname" value="{{ old('firstname') }}">
        <br>

        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" value="{{ old('lastname') }}">
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ old('address') }}">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <br>

        <button type="submit">Create</button>
    </form>
</body>

</html>