@extends('dash_layout.index')

@section('content')
<div class="container printable-area">
    <h1 class="my-4">Ripoti ya Balance ya Watumiaji</h1>

    @foreach ($users as $user)
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Mtumiaji ID: {{ $user->id }} | Jina: {{ $user->name }}
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Meza</th>
                            <th>Kiasi Kilicholipwa</th>
                            <th>Kiasi Kilichotolewa</th>
                            <th>Salio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalDepositBalance = 0;
                            $totalShareBalance = 0;
                            $totalSavingBalance = 0;
                            $totalLoanBalance = 0;
                        @endphp

                        <!-- Deposit Balance -->
                        <tr>
                            <td>Deposit</td>
                            <td>{{ number_format($user->deposite->sum('paid_in'), 2) }}</td>
                            <td>{{ number_format($user->deposite->sum('withdraw'), 2) }}</td>
                            <td>{{ number_format($user->deposite->sum('balance'), 2) }}</td>
                            @php $totalDepositBalance += $user->deposite->sum('balance'); @endphp
                        </tr>

                        <!-- Share Balance -->
                        <tr>
                            <td>Share</td>
                            <td>{{ number_format($user->shares->sum('paid_in'), 2) }}</td>
                            <td>{{ number_format($user->shares->sum('withdraw'), 2) }}</td>
                            <td>{{ number_format($user->shares->sum('balance'), 2) }}</td>
                            @php $totalShareBalance += $user->shares->sum('balance'); @endphp
                        </tr>

                        <!-- Saving Balance -->
                        <tr>
                            <td>Saving</td>
                            <td>{{ number_format($user->savings->sum('paid_in'), 2) }}</td>
                            <td>{{ number_format($user->savings->sum('withdraw'), 2) }}</td>
                            <td>{{ number_format($user->savings->sum('balance'), 2) }}</td>
                            @php $totalSavingBalance += $user->savings->sum('balance'); @endphp
                        </tr>

                        <!-- Loan Balance -->
                        <tr>
                            <td>Loan</td>
                            <td>{{ number_format($user->loans->sum('amount'), 2) }}</td>
                            <td>{{ number_format($user->loans->sum('withdraw'), 2) }}</td>
                            <td>{{ number_format($user->loans->sum('balance'), 2) }}</td>
                            @php $totalLoanBalance += $user->loans->sum('balance'); @endphp
                        </tr>
                    </tbody>
                </table>

                <h6><strong>Jumla ya Balance ya Mtumiaji huu: </strong>{{ number_format($totalDepositBalance + $totalShareBalance + $totalSavingBalance + $totalLoanBalance, 2) }}</h6>
            </div>
        </div>
    @endforeach

    <!-- Jumla ya Balance za Watumiaji Wote -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            Jumla ya Balance za Watumiaji Wote
        </div>
        <div class="card-body">
            <p><strong>Jumla ya Balance za Deposit: </strong>{{ number_format($totalDepositBalance, 2) }}</p>
            <p><strong>Jumla ya Balance za Share: </strong>{{ number_format($totalShareBalance, 2) }}</p>
            <p><strong>Jumla ya Balance za Saving: </strong>{{ number_format($totalSavingBalance, 2) }}</p>
            <p><strong>Jumla ya Balance za Loan: </strong>{{ number_format($totalLoanBalance, 2) }}</p>
            <p><strong>Jumla ya Balance za Watumiaji Wote: </strong>{{ number_format($totalDepositBalance + $totalShareBalance + $totalSavingBalance + $totalLoanBalance, 2) }}</p>
        </div>
    </div>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Chapisha Ripoti</button>
</div>
@endsection
