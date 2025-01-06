@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Apply for a Loan</h1>

    <form action="{{ route('loan_application.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="loan_term">Loan Term (in months)</label>
            <input type="number" name="loan_term" id="loan_term" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
