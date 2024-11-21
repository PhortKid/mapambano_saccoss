@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">SHARES</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
 
<div class="table-responsive">

<table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Properties No</th>
<th>Customer Name</th>
<th>PaidIn</th>
<th>Withdraw</th>
<th>Balance</th>
<th>Date</th>


</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count($shares)>0)
    
   @foreach ($shares as $share)
   <tr>
    <td><?php echo $i++ ?></td>
    <td> {{$share->properties_number}}</td>
    <td> {{$share->user->firstname}}  {{$share->user->lastname}}</td>
    <td>{{number_format($share->paid_in,2)}}</td>
    <td>{{number_format($share->withdraw,2)}}</td>
    <td>{{number_format($share->balance,2)}}</td>
    <td>{{$share->created_at}}</td>
 
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection