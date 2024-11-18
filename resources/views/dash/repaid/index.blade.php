@extends('dash_layout.index')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">LOANS</h1>
    
</div>

   
    
<!-- DATA TABLE -->     
   <div class="row">
  
   
    <div class="col-8 col-sm-10"></div> <div class="col-4 col-sm-2"> <div class="btn btn-success m-1" data-bs-toggle="modal" data-bs-target="#addmember">LIPA MKOPO</div></div>
  </div> 
<div class="table-responsive">

<table   class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="table-dark">
<tr>
<th>#</th>
<th>FullName/Jina</th>
<th>Amount/Kiasi</th>
<th>Balance/Salio</th>
<th>Date</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>


<tbody class="table table-striped table-hover ">

  <?php $i=1;  ?>
@if(count($users)>0)
    
   @foreach ($users as $user)
   @foreach ($user->loans as $loan)
   <tr>
    <td><?php echo $i++ ?></td>
    <td>{{$user->firstname}}  {{$user->lastname}}</td>
    <td>{{ number_format($loan->amount, 2)}}</td>
    <td>{{number_format($loan->balance, 2)}}</td>
    <td>{{$user->created_at}}</td>
    <!--<td><a href='#' data-bs-toggle='modal' data-id=''  data-bs-target='#pop' class='showdata' value='' name='data'><i class='fa fa-edit'></i></a></td>-->
    <td><a href="#"  data-bs-toggle="modal" data-bs-target="#EditShare{{$user->id}}"><i class='fa fa-edit'></i></a></td>
    <td><a href='#'  data-bs-toggle="modal" data-bs-target="#DeleteShare{{$user->id}}"><i class='fa fa-trash'></i></a></td>
    
    
    </tr> 
      @endforeach
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
          

        <h1>Ongeza Muamala kwa Mtumiaji Yeyote</h1>

<form action="{{ route('repaid_management.store') }}" method="POST">
    @csrf

    <label for="user">Chagua Mtumiaji:</label>
    <select name="loan_id" id="user" class="form-control"  required>
        <option value="">-- Chagua Mtumiaji na Mkopo --</option>
        @foreach ($users as $user)
            <optgroup label="{{ $user->firstname }}">
                @foreach ($user->loans as $loan)
                    <option value="{{ $loan->id }}">
                        Mkopo ID: {{ $loan->id }} - Salio: {{ number_format($loan->balance, 2) }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>

    <label for="amount">Kiasi cha Kulipa:</label>
    <input type="number" name="amount" id="amount" step="0.01" class="form-control" required placeholder="Ingiza kiasi...">





        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary">Submit</button>
       
          </form>
        </div>
      </div>
    </div>
  </div>


@endsection


