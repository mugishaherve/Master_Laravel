<!-- resources/views/customers/edit.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Edit Customer</title>
</head>

<body>
    <h1>Edit Customer</h1>

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="firstname">Firstname:</label>
        <input type="text" name="firstname" value="{{ old('firstname', $customer->firstname) }}">
        <br>

        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" value="{{ old('lastname', $customer->lastname) }}">
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $customer->email) }}">
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="{{ old('address', $customer->address) }}">
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <br>

        <button type="submit">Update</button>
    </form>
</body>

</html>