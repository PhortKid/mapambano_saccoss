@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">savings</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
 
<div class="table-responsive">

<table   class="table table-bordered" id="example" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Properties No</th>
<th>Customer Name</th>
<th>PaidIn</th>
<th>Withdraw</th>
<th>Balance</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>

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
    <td>{{number_format($saving->paid_in)}}</td>
    <td>{{number_format($saving->withdraw)}}</td>
    <td>{{number_format($saving->balance)}}</td>
    <td>{{$saving->created_at}}</td>
    <!--<td><a href='#' data-bs-toggle='modal' data-id=''  data-bs-target='#pop' class='showdata' value='' name='data'><i class='fa fa-edit'></i></a></td>-->
    <td><a href="#"  data-bs-toggle="modal" data-bs-target="#Editsaving{{$saving->id}}"><i class='fa fa-edit'></i></a></td>
    <td><a href='#'  data-bs-toggle="modal" data-bs-target="#Deletesaving{{$saving->id}}"><i class='fa fa-trash'></i></a></td>
    
    @include('dash.savings.edit')
    @include('dash.savings.delete')
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection