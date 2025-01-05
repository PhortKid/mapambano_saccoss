@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Interest</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
 
<div class="table-responsive">

<table   class="table table-bordered" id="example" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Customer Name</th>
<th>Tobe Paid</th>
<th>paid</th>
<th>Balance</th>
<th>Date</th>
@if(Auth::user()->role !='Applicant')
<th>Edit</th>
<th>Delete</th>
@endif

</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count($interests)>0)
    
@foreach ($interests as $interest)
   <tr>
    <td><?php echo $i++ ?></td>
    <td> {{$interest->user->firstname}}  {{$interest->user->middlename}}   {{$interest->user->lastname}}</td>
    <td>{{number_format($interest->tobe_paid,2)}}</td>
    <td>{{number_format($interest->paid,2)}}</td>
    <td>{{number_format($interest->balance,2)}}</td>
    <td>{{$interest->date}}</td>
    @if(Auth::user()->role !='Applicant')
    <!--<td><a href='#' data-bs-toggle='modal' data-id=''  data-bs-target='#pop' class='showdata' value='' name='data'><i class='fa fa-edit'></i></a></td>-->
    <td><a href="#"  data-bs-toggle="modal" data-bs-target="#EditInterest{{$interest->id}}"><i class='fa fa-edit text-primary'></i></a></td>
    <td><a href='#'  data-bs-toggle="modal" data-bs-target="#DeleteInterest{{$interest->id}}"><i class='fa fa-trash text-danger'></i></a></td>
    
    @include('dash.interest.edit')
    @include('dash.interest.delete')
    @endif
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection