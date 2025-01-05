@extends('dash_layout.index')

@section('content')


    <form action="{{ route('report.date.deposite') }}" method="GET">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input type="date" name="end_date" class="form-control" required>
                </div>
                <div class="col-md-4 pt-4">
                    <button type="submit" class="btn btn-primary">Filter by Date</button>
                </div>
            </div>
        </form>
        <br>

        <div class="container printable-area">
    <h1 class="my-4">Deposit/Akiba Report</h1>
    <table class="table table-bordered" id="example">
        <thead class="">
            <tr>
                <th>#</th>
                <th>Jina la Mtumiaji</th>
                <th>Paid In</th>
                <th>Withdrawn</th>
                <th>Balance</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPaidIn = 0;
                $totalWithdrawn = 0;
                $totalBalance = 0;
            @endphp

            @foreach ($users as $index => $user)
                @php
                    // Assuming the 'deposit' relationship has transactions with 'paid_in' and 'withdrawn' fields
                    $paidIn = $user->deposite->sum('paid_in');
                    $withdrawn = $user->deposite->sum('withdraw');
                    $balance = $paidIn - $withdrawn;

                    // Accumulate totals
                    $totalPaidIn += $paidIn;
                    $totalWithdrawn += $withdrawn;
                    $totalBalance += $balance;
                @endphp

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                    <td>{{ number_format($paidIn, 2) }}</td>
                    <td>{{ number_format($withdrawn, 2) }}</td>
                    <td>{{ number_format($balance, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>Total</strong></td>
                <td><strong>{{ number_format($totalPaidIn, 2) }}</strong></td>
                <td><strong>{{ number_format($totalWithdrawn, 2) }}</strong></td>
                <td><strong>{{ number_format($totalBalance, 2) }}</strong></td>
            </tr>
        </tbody>
     
    </table>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Chapisha Ripoti</button>
</div>
@endsection
