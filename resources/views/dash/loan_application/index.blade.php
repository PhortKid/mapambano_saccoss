<!-- balance/create.blade.php  -->

@extends('dash_layout.index')

@section('content')
<div class="container">
    <h1 class="text-dark">Apply Loan</h1>
    <form action="{{ route('loan_application.store') }}" method="POST">
        @csrf

        <div class="row">
        <div class="col-4">
        <div class="mb-3">
            <label for="title" class="form-label text-dark" >Amount(kiasi kisizidi mara 3 ya akiba)</label>
            <input type="text" name="amount" class="form-control"   required>
        </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
            </div>
      
            <div class="row">
            <div class="col-4">

        <div class="mb-3">
            <label for="title" class="form-label text-dark">Description/Maelezo juu ya mkopo unayoomba</label>
            <textarea name="description" id="" class="form-control"></textarea>
        </div>

        </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
            </div>

     <div class="row">
        <div class="col-4">
        <div class="mb-3">
            <label for="title" class="form-label text-dark ">Loan Term in months/Kipindi cha malipo</label>
            <input type="number" name="loan_term" class="form-control"  required>
        </div>
        </div>
        <div class="col-4"></div>
        <div class="col-4"></div>
     </div>
        

 
        <button type="submit" class="btn btn-success">Apply</button>
    </form>
</div>
@endsection
