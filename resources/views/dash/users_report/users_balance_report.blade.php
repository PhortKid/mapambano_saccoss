@extends('dash_layout.index')

@section('content')
<div class="container ">
    <h1 class="my-4">Ripoti ya Balance ya Watumiaji</h1>

    <table class="table table-bordered printable-area" id="example">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Jina la Mtumiaji</th>
                <th>Deposit (Salio)</th>
                <th>Share (Salio)</th>
                <th>Saving (Salio)</th>
                <th>Loan (Salio)</th>
                <th>Jumla ya Salio</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalDepositBalance = 0;
                $totalShareBalance = 0;
                $totalSavingBalance = 0;
                $totalLoanBalance = 0;
                $grandTotalBalance = 0;
            @endphp

            @foreach ($users as $index => $user)
                @php
                    $userDepositBalance = $user->deposite->sum('balance');
                    $userShareBalance = $user->shares->sum('balance');
                    $userSavingBalance = $user->savings->sum('balance');
                    $userLoanBalance = $user->loans->sum('balance');
                    $totalBalance = $userDepositBalance + $userShareBalance + $userSavingBalance + $userLoanBalance;

                    // Accumulate total balances for all users
                    $totalDepositBalance += $userDepositBalance;
                    $totalShareBalance += $userShareBalance;
                    $totalSavingBalance += $userSavingBalance;
                    $totalLoanBalance += $userLoanBalance;
                    $grandTotalBalance += $totalBalance;
                @endphp

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                    <td>{{ number_format($userDepositBalance, 2) }}</td>
                    <td>{{ number_format($userShareBalance, 2) }}</td>
                    <td>{{ number_format($userSavingBalance, 2) }}</td>
                    <td>{{ number_format($userLoanBalance, 2) }}</td>
                    <td>{{ number_format($totalBalance, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="table-dark">
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>{{ number_format($totalDepositBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalShareBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalSavingBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalLoanBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($grandTotalBalance, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Chapisha Ripoti</button>
</div>
@endsection
