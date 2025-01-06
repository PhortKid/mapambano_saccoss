@extends('dash_layout.index')


@section('content')
<div class="container">
    <h1>Edit Loan Application</h1>

    <form action="{{ route('loan-applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ $application->amount }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $application->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="loan_term">Loan Term (in months)</label>
            <input type="number" name="loan_term" id="loan_term" class="form-control" value="{{ $application->loan_term }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
