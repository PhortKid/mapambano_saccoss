@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Edit Balance</h1>
    <form action="{{ route('balances.update', $balance) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $balance->title }}" required>
        </div>

        <div class="mb-3">
            <label for="opening_debit" class="form-label">Opening Debit</label>
            <input type="number" step="0.01" name="opening_debit" class="form-control" value="{{ $balance->opening_debit }}">
        </div>

        <div class="mb-3">
            <label for="opening_credit" class="form-label">Opening Credit</label>
            <input type="number" step="0.01" name="opening_credit" class="form-control" value="{{ $balance->opening_credit }}">
        </div>

        <div class="mb-3">
            <label for="monthly_debit" class="form-label">Monthly Debit</label>
            <input type="number" step="0.01" name="monthly_debit" class="form-control" value="{{ $balance->monthly_debit }}">
        </div>

        <div class="mb-3">
            <label for="monthly_credit" class="form-label">Monthly Credit</label>
            <input type="number" step="0.01" name="monthly_credit" class="form-control" value="{{ $balance->monthly_credit }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('balances.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
