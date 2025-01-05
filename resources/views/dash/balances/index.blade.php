<!-- balance/index.blade.php  -->

@extends('dash_layout.index')

@section('content')
@if(Auth::user()->role !="Applicant")
<div class="container">
    <h1>Urari</h1>
    <a href="{{ route('balances.create') }}" class="btn btn-primary">Add Urari</a>

    <form action="{{ route('balances.index') }}" method="GET" class="mb-3">
    <div class="row">
        <!-- Filter by Month -->
        <div class="col-md-4">
            <label for="month" class="form-label">Filter by Month:</label>
            <input type="month" name="month" id="month" class="form-control" value="{{ request('month') }}">
        </div>
        <!-- Filter by Date -->
       <!-- <div class="col-md-4">
            <label for="date" class="form-label">Filter by Date:</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ request('date') }}">
        </div> -->
        <!-- Submit Button -->
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('balances.index') }}" class="btn btn-secondary ms-2">Reset</a>
        </div>
    </div>
</form>

    <table class="table mt-3 table-bordered ">
    
        <thead>
        <tr>
                <th>MAELEZO</th>
                <th colspan="2">SALIO ANZIA</th>
                <th colspan="2">URARI WA MWEZI</th>
                <th colspan="2">JONAL </th>
                
                <th >MWEZI</th>
                <th colspan="2">TOTAL</th>
     
               <th >Actions</th>
            </tr>
            <tr>
                <th></th>
                <th>DR</th>
                <th>CR</th>
                <th>DR</th>
                <th>CR</th>
                <th>DR</th>
                <th>CR</th>
                <th></th>
                <th>DR</th>
                <th>CR</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($balances as $balance)
            <tr>
                <td>{{ $balance->title }}</td>
                <td>{{ number_format($balance->opening_debit) }}</td>
                <td>{{ number_format($balance->opening_credit,2) }}</td>
                <td>{{ number_format($balance->monthly_debit,2) }}</td>
                <td>{{ number_format($balance->monthly_credit,2) }}</td>
                <td>{{ number_format($balance->jonal_debit,2) }}</td>
                <td>{{ number_format($balance->jonal_credit,2) }}</td>
                <td>{{ \Carbon\Carbon::parse($balance->date)->translatedFormat('F') }}</td>
                <td>{{ number_format($balance->total_debit,2) }}</td>
                <td>{{ number_format($balance->total_credit,2) }}</td>
               <td>
                    
                    
                    <form action="{{ route('balances.create')}}" method="GET" style="display:inline;">
                        @csrf
                       <input type="hidden" name="total_credit" value="{{$balance->total_credit}}">
                       <input type="hidden" name="total_debit" value="{{ $balance->total_debit }}">
                       <input type="hidden" name="maelezo" value="{{$balance->title}}">

                        <button type="submit" class="btn btn-primary">Add </button>
                    </form>

                    <form action="{{ route('balances.destroy', $balance) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                       
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
