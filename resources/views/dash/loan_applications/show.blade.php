@extends('dash_layout.index')


@section('content')
<div class="container">
    <h1>Loan Application Details</h1>

    <p><strong>Client:</strong> {{ $application->client->name }}</p>
    <p><strong>Amount:</strong> {{ $application->amount }}</p>
    <p><strong>Description:</strong> {{ $application->description }}</p>
    <p><strong>Loan Term:</strong> {{ $application->loan_term }} months</p>
    <p><strong>Status:</strong> {{ ucfirst($application->is_approved) }}</p>

    @if(auth()->user()->role != 'client')
        @include('dash.loan_applications.partials.approval', ['application' => $application])
    @endif
</div>
@endsection
