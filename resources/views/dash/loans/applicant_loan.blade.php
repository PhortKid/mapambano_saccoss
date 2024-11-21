@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">LOAN</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
 
<div class="table-responsive">

<table   class="table table-bordered" id="example" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Properties No</th>
<th>Customer Name</th>
<th>Issued</th>
<th>Repaid</th>
<th>Balance</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>

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
    <td>{{number_format($loan->issued,2)}}</td>
    <td>{{number_format($loan->repaid,2)}}</td>
    <td>{{number_format($loan->balance,2)}}</td>
    <td>{{$loan->created_at}}</td>
    <!--<td><a href='#' data-bs-toggle='modal' data-id=''  data-bs-target='#pop' class='showdata' value='' name='data'><i class='fa fa-edit'></i></a></td>-->
    <td><a href="#"  data-bs-toggle="modal" data-bs-target="#EditShare{{$loan->id}}"><i class='fa fa-edit'></i></a></td>
    <td><a href='#'  data-bs-toggle="modal" data-bs-target="#DeleteShare{{$loan->id}}"><i class='fa fa-trash'></i></a></td>
    
    @include('dash.loans.edit')
    @include('dash.loans.delete')
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection