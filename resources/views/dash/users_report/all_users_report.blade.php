@extends('dash_layout.index')


@section('content')
<div class="container printable-area">
    <h1 class="my-4">Ripoti ya Watumiaji na Mikopo</h1>
    <?php $i=1;  ?>
    <!-- Orodha ya Watumiaji na Mikopo -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Jina</th>
                <th>Email</th>
                <th>Jumla ya Mikopo</th>
                <th>Salio la Mikopo</th>
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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
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
                <td colspan="3" class="text-right"><strong>Jumla</strong></td>
                <td><strong>{{ number_format($totalLoanAmount, 2) }}</strong></td>
                <td><strong>{{ number_format($totalBalance, 2) }}</strong></td>
            </tr>
        </tfoot>
    </table>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Chapisha Ripoti</button>
</div>
@endsection