@extends('dash_layout.index')


@section('content')
<div class="container printable-area">
    <h1 class="my-4">All Applicant report</h1>
    <?php $i=1;  ?>
    <!-- Orodha ya Watumiaji na Mikopo -->
    <table class="table table-striped table-bordered" id="example">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Phone</th>
                <th>Total Loan Amount</th>
                <th>Loan Balance</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalLoanAmount = 0;
                $totalBalance = 0;
            @endphp

            @foreach ($users as $user)
                @php
                    $userLoanAmount = 0;
                    $userBalance = 0;
                @endphp

                @foreach ($user->loans as $loan)
                    @php
                        $userLoanAmount += $loan->amount;
                        $userBalance += $loan->balance;
                    @endphp
                @endforeach

                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ number_format($userLoanAmount, 2) }}</td>
                    <td>{{ number_format($userBalance, 2) }}</td>
                </tr>

                @php
                    $totalLoanAmount += $userLoanAmount;
                    $totalBalance += $userBalance;
                @endphp
            @endforeach
        </tbody>
        <!-- Sehemu ya Jumla (footer) ya Mikopo na Salio -->
        <tfoot class="table-dark">
            <tr>
                <td colspan="3" class="text-right"><strong>Total</strong></td>
                <td><strong>{{ number_format($totalLoanAmount, 2) }}</strong></td>
                <td><strong>{{ number_format($totalBalance, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Print report</button>
</div>
@endsection