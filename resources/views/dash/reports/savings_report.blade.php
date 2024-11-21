@extends('dash_layout.index')

@section('content')
<div class="container printable-area">
    <h1 class="my-4">Saving Report</h1>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Fullname</th>
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
                    // Assuming the 'saving' relationship has transactions with 'paid_in' and 'withdrawn' fields
                    $paidIn = $user->savings->sum('paid_in');
                    $withdrawn = $user->savings->sum('withdraw');
                    $balance = $paidIn - $withdrawn;

                    // Accumulate totals
                    $totalPaidIn += $paidIn;
                    $totalWithdrawn += $withdrawn;
                    $totalBalance += $balance;
                @endphp

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}}</td>
                    <td>{{ number_format($paidIn, 2) }}</td>
                    <td>{{ number_format($withdrawn, 2) }}</td>
                    <td>{{ number_format($balance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="table-dark">
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>{{ number_format($totalPaidIn, 2) }}</strong></td>
                <td><strong>{{ number_format($totalWithdrawn, 2) }}</strong></td>
                <td><strong>{{ number_format($totalBalance, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Chapisha Ripoti</button>
</div>
@endsection
