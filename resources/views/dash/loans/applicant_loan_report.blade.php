@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">LOAN</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
 
<div class="table-responsive">

<table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Properties No</th>
<th>Customer Name</th>
<th>Issued</th>
<th>Repaid</th>
<th>Balance</th>
<th>Date</th>


</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count($loans)>0)
    
   @foreach ($loans as $loan)
   <tr>
    <td><?php echo $i++ ?></td>
    <td> {{$loan->properties_number}}</td>
    <td> {{$loan->user->firstname}}  {{$loan->user->lastname}}</td>
    <td>{{$loan->issued}}</td>
    <td>{{$loan->repaid}}</td>
    <td>{{$loan->balance}}</td>
    <td>{{$loan->created_at}}</td>
 
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection