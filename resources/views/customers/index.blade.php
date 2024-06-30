<!-- resources/views/customers/index.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Customers List</title>
</head>

<body>
    <h1>Customers List</h1>
    <a href="{{ route('customers.create') }}">Create New Customer</a>

    @if (session('success'))
    <div>
        {{ session('success') }}
    </div>
    @endif

    @if ($customers->count())
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->firstname }}</td>
                <td>{{ $customer->lastname }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No customers found.</p>
    @endif
</body>

</html>