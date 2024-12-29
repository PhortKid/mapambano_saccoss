@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Monthly Report</h1>
    <form action="{{ route('balances.generateReport') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="month" class="form-label">Select Month</label>
            <input type="month" name="month" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>

    @if(isset($balances))
    <h2 class="mt-4">Report for {{ \Carbon\Carbon::parse($month)->format('F Y') }}</h2>
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
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Totals</th>
                <th>{{ $totals['opening_debit'] }}</th>
                <th>{{ $totals['opening_credit'] }}</th>
                <th>{{ $totals['monthly_debit'] }}</th>
                <th>{{ $totals['monthly_credit'] }}</th>
                <th>{{ $totals['total_debit'] }}</th>
                <th>{{ $totals['total_credit'] }}</th>
            </tr>
        </tfoot>
    </table>
    @endif
</div>
@endsection
