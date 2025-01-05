@extends('dash_layout.index')

@section('content')
<div class="container ">
    <h1 class="my-4">All Applicant Report </h1> <h4>Date:{{$startDate}} Up to {{$endDate}}</h4>

    <form action="{{ route('user.balance.date.report') }}" method="GET">
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

    <table class="table table-bordered printable-area" id="example">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Jina la Mtumiaji</th>
                <th>Deposit (Salio)</th>
                <th>Share (Salio)</th>
                <th>Saving (Salio)</th>
                <th>Loan (Salio)</th>
                <th>Interest/Riba (Salio)</th>
                <!--<th>Jumla ya Salio</th>-->
            </tr>
        </thead>
        <tbody>
            @php
                $totalDepositBalance = 0;
                $totalShareBalance = 0;
                $totalSavingBalance = 0;
                $totalLoanBalance = 0;
                $totalInterestBalance = 0;
                $grandTotalBalance = 0;
            @endphp

            @foreach ($users as $index => $user)
                @php
                    $userDepositBalance = $user->deposite->sum('balance');
                    $userShareBalance = $user->shares->sum('balance');
                    $userSavingBalance = $user->savings->sum('balance');
                    $userLoanBalance = $user->loans->sum('balance');
                    $userInterestBalance = $user->interest->sum('balance');
                    $totalBalance = $userDepositBalance + $userShareBalance + $userSavingBalance + $userLoanBalance +$userInterestBalance;

                    // Accumulate total balances for all users
                    $totalDepositBalance += $userDepositBalance;
                    $totalShareBalance += $userShareBalance;
                    $totalSavingBalance += $userSavingBalance;
                    $totalLoanBalance += $userLoanBalance;
                    $totalInterestBalance +=$userInterestBalance;
                    $grandTotalBalance += $totalBalance;
                @endphp

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</td>
                    <td>{{ number_format($userDepositBalance, 2) }}</td>
                    <td>{{ number_format($userShareBalance, 2) }}</td>
                    <td>{{ number_format($userSavingBalance, 2) }}</td>
                    <td>{{ number_format($userLoanBalance, 2) }}</td>
                    <td>{{ number_format($userInterestBalance, 2) }}</td>
                   <!-- <td>{{ number_format($totalBalance, 2) }}</td>  -->
                </tr>

          
            @endforeach
            <tr>
                <td ><strong>Total  </strong></td>
                <td ><strong>Total</strong></td>
                <td><strong>{{ number_format($totalDepositBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalShareBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalSavingBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalLoanBalance, 2) }}</strong></td>
                <td><strong>{{ number_format($totalInterestBalance, 2) }}</strong></td>
               <!-- <td><strong>{{ number_format($grandTotalBalance, 2) }}</strong></td>-->
            </tr>
        </tbody>
        <?php  /*
        <tfoot class="table-dark">
           
        </tfoot>

        */ ?>
    </table>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Print report</button>
</div>
@endsection
