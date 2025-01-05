@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">deposite</h1>
    
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
<!--<th>Edit</th>
<th>Delete</th> -->

</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count($deposites)>0)
    
   @foreach ($deposites as $deposite)
   <tr>
    <td><?php echo $i++ ?></td>
    <td> {{$deposite->properties_number}}</td>
    <td> {{$deposite->user->firstname}}  {{$deposite->user->lastname}}</td>
    <td>{{number_format($deposite->paid_in,2)}}</td>
    <td>{{number_format($deposite->withdraw,2)}}</td>
    <td>{{number_format($deposite->balance,2)}}</td>
    <td>{{$deposite->created_at}}</td>
    <!--<td><a href='#' data-bs-toggle='modal' data-id=''  data-bs-target='#pop' class='showdata' value='' name='data'><i class='fa fa-edit'></i></a></td>-->
    <!--<td><a href="#"  data-bs-toggle="modal" data-bs-target="#Editdeposite{{$deposite->id}}"><i class='fa fa-edit'></i></a></td>
    <td><a href='#'  data-bs-toggle="modal" data-bs-target="#Deletedeposite{{$deposite->id}}"><i class='fa fa-trash'></i></a></td>
-->
    @include('dash.deposites.edit')
    @include('dash.deposites.delete')
    </tr> 
   @endforeach
@else 

  
  @endif
  </tbody>
</table>
</div>   

@endsection