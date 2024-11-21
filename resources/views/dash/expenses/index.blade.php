








@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">EXPENSE</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
   <div class="row">
    <div class="col-8 col-sm-10"></div> <div class="col-4 col-sm-2"> <div class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#addmember">Add Expense</div></div>
  </div> 
<div class="table-responsive">

<table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>Description</th>
<th>Debit</th>
<th>credit</th>
<th>Balance</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count(  $expenses)>0)
    
   @foreach ($expenses as   $expense)
   <tr>
    <td><?php echo $i++ ?></td>
    <td> {{  $expense->expense_description}}</td>
    
    <td>{{  number_format($expense->debit,2)}}</td>
    <td> {{  number_format($expense->credit,2)}}</td>
    <td>{{  number_format($expense->balance,2)}}</td>
    <td>{{  $expense->date}}</td>
    <!--<td><a href='#' data-bs-toggle='modal' data-id=''  data-bs-target='#pop' class='showdata' value='' name='data'><i class='fa fa-edit'></i></a></td>-->
    <td><a href="#"  data-bs-toggle="modal" data-bs-target="#EditExpense{{$expense->id}}"><i class='fa fa-edit'></i></a></td>
    <td><a href='#'  data-bs-toggle="modal" data-bs-target="#DeleteExpense{{$expense->id}}"><i class='fa fa-trash'></i></a></td>
    
    @include('dash.expenses.edit')
    @include('dash.expenses.delete')
    </tr> 
   @endforeach
@else 

  
  @endif



</tbody>
</table>
</div>   

      

<div class="modal fade " id="addmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">CREATE EXPENSE</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
          
       <form action="{{route('expenses_management.store')}}" method="post">
       



      

        <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Expense Description</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText"  name="expense_description" required>
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Debit</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="debit" >
                </div>
                </div>
     @csrf
                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Credit</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="credit" >
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">DATE</label>
                <div class="col-sm-10">
                    <input type="date"  class="form-control" id="inputText" name="date" required>
                </div>
                </div>

            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
       
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection

