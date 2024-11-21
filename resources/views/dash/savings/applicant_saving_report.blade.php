@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">savingS</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
 
<div class="table-responsive">

<table   class="table table-bordered" id="example"  width="100%" cellspacing="0">

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
@if(count($savings)>0)
    
   @foreach ($savings as $saving)
   <tr>
    <td><?php echo $i++ ?></td>
    <td> {{$saving->properties_number}}</td>
    <td> {{$saving->user->firstname}}  {{$saving->user->lastname}}</td>
    <td>{{number_format($saving->paid_in,2)}}</td>
    <td>{{number_format($saving->withdraw,2)}}</td>
    <td>{{number_format($saving->balance,2)}}</td>
    <td>{{$saving->created_at}}</td>
 
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection