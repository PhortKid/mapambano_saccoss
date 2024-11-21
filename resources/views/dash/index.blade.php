@extends('dash_layout.index')


@section('content')
<h1>DASHBOARD</h1>
<BR>
@include('dash.shares')
@include('dash.savings')
@include('dash.deposite')
@include('dash.loans_amount')
@include('dash.loans_balance')
<!-- Content Row -->
 @endsection
