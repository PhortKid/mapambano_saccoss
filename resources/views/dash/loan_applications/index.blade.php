@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Loan Applications</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Client</th>
                <th>Amount</th>
                <th>Loan Term</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->client->firstname}} {{ $application->client->lastname}}</td>
                    <td>{{ $application->amount }}</td>
                    <td>{{ $application->loan_term }} months</td>
                    <td>{{ ucfirst($application->is_approved) }}</td>
                    <td>
                        <a href="{{ route('loan_application.show', $application->id) }}" class="btn btn-info btn-sm">View</a>
                        @if(auth()->user()->role == 'client' && $application->is_approved == 'pending')
                            <a href="{{ route('loan_applications.edit', $application->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('loan_application.destroy', $application->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
