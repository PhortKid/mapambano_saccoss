@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">LOANS</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
   <div class="row">
  
   
    <div class="col-8 col-sm-10"></div> <div class="col-4 col-sm-2"> <div class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#addmember">ADD LOANS</div></div>
  </div> 
<div class="table-responsive">

<table   class="table table-bordered" id="example" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Customer Name</th>
<th>Amount</th>
<th>Balance</th>
<th>Date</th>
<th>Action</th>


</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count($loan_applications)>0)
    
   @foreach ($loan_applications as $loan_application)
   <tr>
    <td><?php echo $i++ ?></td>
   <td>{{$loan_application->user->firstname}}  {{$loan_application->user->lastname}}</td> 
    <td>{{number_format($loan_application->amount,2)}}</td>
    <td>{{number_format($loan_application->decription,2)}}</td>
    <td>{{$loan_application->created_at}}</td>
  
    
    

 
    </tr> 
   @endforeach
@else 

  
  @endif



</tbody>
</table>
</div>   



@endsection


