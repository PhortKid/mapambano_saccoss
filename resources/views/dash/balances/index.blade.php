@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Balances</h1>
    <a href="{{ route('balances.create') }}" class="btn btn-primary">Add Balance</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Opening Debit</th>
                <th>Opening Credit</th>
                <th>Monthly Debit</th>
                <th>Monthly Credit</th>
                <th>Total Debit</th>
                <th>Total Credit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($balances as $balance)
            <tr>
                <td>{{ $balance->title }}</td>
                <td>{{ $balance->opening_debit }}</td>
                <td>{{ $balance->opening_credit }}</td>
                <td>{{ $balance->monthly_debit }}</td>
                <td>{{ $balance->monthly_credit }}</td>
                <td>{{ $balance->total_debit }}</td>
                <td>{{ $balance->total_credit }}</td>
                <td>
                    <a href="{{ route('balances.edit', $balance) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('balances.destroy', $balance) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
