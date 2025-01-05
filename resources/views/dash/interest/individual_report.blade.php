@extends('dash_layout.index')

@section('content')
<div class="container printable-area">
    <h1 class="my-4">Applicant Report</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Fullname: {{ $user->firstname}} {{ $user->middlename}} {{ $user->lastname}}</h4>
            <p class="card-text">Phone: {{ $user->phone_number }}</p>
        </div>
    </div>

    @foreach ($user->loans as $loan)
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Loan ID: {{ $interest->id }} | Amount: {{ number_format($interest->amount, 2) }} | Balance: {{ number_format($loan->balance, 2) }}
            </div>
            <div class="card-body">
                <h5>Transaction:</h5>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Repaid Amount</th>
                            <!--<th>Fee (10%)</th>-->
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                        @php
                            $totalPaid = 0; // Inatumiwa kuhifadhi jumla ya kiasi kilicholipwa kwa mkopo huu
                        @endphp

                        @foreach ($loan->transactions as $transaction)
                            @php
                                $totalPaid += $transaction->amount; // Jumuisha kiasi kilicholipwa
                            @endphp
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ number_format($transaction->amount, 2) }}</td>
                            <!--    <td>{{ number_format($transaction->fee, 2) }}</td>-->
                                <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <!-- Footer ya jumla -->
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="2" class="text-right"><strong>Total Repaid</strong></td>
                            <td><strong>{{ number_format($totalPaid, 2) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    @endforeach

    <!-- Jumla ya Mikopo na Salio kwa Mtumiaji -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
           Total User Loan
        </div>
        <div class="card-body">
            <p><strong>Total Loan: </strong>{{ number_format($user->loans->sum('amount'), 2) }}</p>
            <p><strong>Total Balance: </strong>{{ number_format($user->loans->sum('balance'), 2) }}</p>
        </div>
    </div>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Print Report</button>
</div>
@endsection


