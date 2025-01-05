<!-- balance/create.blade.php  -->

@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Add Balance</h1>
    <form action="{{ route('balances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Maelezo</label>
            <input type="text" name="title" class="form-control" value="{{$lastmonth_title}}" required>
        </div>
        <div class="mb-3">
            <label for="opening_debit" class="form-label">DR SALIO ANZIA</label>
            <input type="number" step="0.01" name="opening_debit" class="form-control" value="{{$lastmonth_debit}}">
        </div>
        <div class="mb-3">
            <label for="opening_credit" class="form-label">CR SALIO ANZIA</label>
            <input type="number" step="0.01" name="opening_credit" class="form-control" value="{{$lastmonth_credit}}">
        </div>
        <div class="mb-3">
            <label for="monthly_debit" class="form-label">DR URARI</label>
            <input type="number" step="0.01" name="monthly_debit" class="form-control">
        </div>
        <div class="mb-3">
            <label for="monthly_credit" class="form-label">CR URARI</label>
            <input type="number" step="0.01" name="monthly_credit" class="form-control">
        </div>

        
        <div class="mb-3">
            <label for="monthly_debit" class="form-label">DR JONAL</label>
            <input type="number" step="0.01" name="jonal_debit" class="form-control">
        </div>
        <div class="mb-3">
            <label for="monthly_credit" class="form-label">CR JONAL</label>
            <input type="number" step="0.01" name="jonal_credit" class="form-control">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date"  name="date" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
