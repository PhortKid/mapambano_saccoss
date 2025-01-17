@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1>Monthly Report</h1>

<div class="row">
    <div class="col-4">
    <form action="{{ route('balances.generateReport') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="month" class="form-label">Select Month</label>
            <input type="month" name="month" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Generate Report</button>
    </form>
    </div>
    <div class="col-4"></div>
    <div class="col-4"></div>
</div>
   

    @if(isset($balances))
    <h2 class="mt-4">Report for {{ \Carbon\Carbon::parse($month)->format('F Y') }}</h2>
    <table class="table mt-3 table-bordered display" id="urari">
    <thead>
        <tr>
        <th colspan="9">Report for {{ \Carbon\Carbon::parse($month)->format('F Y') }}</th>
        </tr>
        <tr>
                
                <th>MAELEZO</th>
                <th colspan="2">SALIO ANZIA</th>
                <th colspan="2">URARI WA MWEZI</th>
                <th colspan="2">JONAL </th>
                <th colspan="2">TOTAL</th>
     
                
            </tr>
            
            <tr>
                <th></th>
                <th>DR</th>
                <th>CR</th>
                <th>DR</th>
                <th>CR</th>
                <th>DR</th>
                <th>CR</th>
                <th>DR</th>
                <th>CR</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach ($balances as $balance)
            <tr>
                <td>{{ $balance->title }}</td>
                <td>{{ number_format($balance->opening_debit,2) }}</td>
                <td>{{ number_format($balance->opening_credit,2) }}</td>
                <td>{{ number_format($balance->monthly_debit,2) }}</td>
                <td>{{ number_format($balance->monthly_credit,2) }}</td>
                <td>{{ number_format($balance->jonal_debit,2) }}</td>
                <td>{{ number_format($balance->jonal_credit,2) }}</td>
                <td>{{ number_format($balance->total_debit,2) }}</td>
                <td>{{ number_format($balance->total_credit,2) }}</td>
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
                <th>{{ $totals['jonal_debit'] }}</th>
                <th>{{ $totals['jonal_credit'] }}</th>
                <th>{{ $totals['total_debit'] }}</th>
                <th>{{ $totals['total_credit'] }}</th>
            </tr>
        </tfoot>
    </table>
    @endif
</div>
@endsection
