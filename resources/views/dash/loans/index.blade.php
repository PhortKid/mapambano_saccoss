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

<table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Customer Name</th>
<th>Amount</th>
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
    <td>{{$loan->user->firstname}}  {{$loan->user->lastname}}</td>
    <td>{{$loan->amount}}</td>
    <td>{{$loan->balance}}</td>
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

      

<div class="modal fade " id="addmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">CREATE SHARE</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
          
       <form action="{{route('loans_management.store')}}" method="post">
       



       <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Select Customer</label>

                <div class="col-sm-10">
                <select class="form-select form-control" aria-label="Default select example" name="applicant" >
                  
                @if(count($users)>0)
    
                @foreach ($users as $user)
                  
                <option value="{{$user->id}}">{{$user->firtname}} {{$user->lastname}}</option>
               
                 @endforeach
                 @endif
                </select>
                </div>
                </div>

             
     @csrf
                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="amount" required>
                </div>
                </div>

            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary">Submit</button>
       
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection


