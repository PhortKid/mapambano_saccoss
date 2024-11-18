@extends('dash_layout.index')

@section('content')
<div class="container printable-area">
    <h1 class="my-4">Ripoti ya Mtumiaji</h1>
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="card-title">Jina: {{ $user->name }}</h4>
            <p class="card-text">Email: {{ $user->email }}</p>
        </div>
    </div>

    @foreach ($user->loans as $loan)
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Mkopo ID: {{ $loan->id }} | Kiasi: {{ number_format($loan->amount, 2) }} | Salio: {{ number_format($loan->balance, 2) }}
            </div>
            <div class="card-body">
                <h5>Miamala:</h5>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Kiasi Kilicholipwa</th>
                            <th>Ada (10%)</th>
                            <th>Tarehe</th>
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
                                <td>{{ number_format($transaction->fee, 2) }}</td>
                                <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                    <!-- Footer ya jumla -->
                    <tfoot class="table-dark">
                        <tr>
                            <td colspan="3" class="text-right"><strong>Jumla ya Kiasi Kilicholipwa</strong></td>
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
            Jumla ya Mikopo ya Mtumiaji
        </div>
        <div class="card-body">
            <p><strong>Jumla ya Mikopo: </strong>{{ number_format($user->loans->sum('amount'), 2) }}</p>
            <p><strong>Jumla ya Salio: </strong>{{ number_format($user->loans->sum('balance'), 2) }}</p>
        </div>
    </div>

    <!-- Kitufe cha Chapisha Ripoti -->
    <button class="btn btn-success mt-3" onclick="window.print()">Chapisha Ripoti</button>
</div>
@endsection


