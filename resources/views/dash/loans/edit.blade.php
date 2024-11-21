<div class="modal fade " id="EditExpense{{$expense->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">EDIT LOAN</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
      {!! html()->form('PUT', route('loans_management.update', $loans->id))->open() !!}
      <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Select Customer</label>

                <div class="col-sm-10">
                <select class="form-select form-control" aria-label="Default select example" name="applicant" desabled>
                  
               
                  
                <option value="">{{$user->firstname}} {{$user->middlename}} {{$user->lastname}}</option>
               
                 
                </select>
                </div>
                </div>

             
     @csrf
                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Amount</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="amount" value="{{$loan->amount}}" required>
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Rate</label>
                <div class="col-sm-10">
                  <select name="rate" id="" class="form-control">
                  <option value="">--- Select Rate --</option>
                  <option value="0.1">With interest 10%</option>
                  <option value="0">Without interest 0%</option>
                  
                
                    
                  </select>
                   
                </div>
                </div>

                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit</button>
       
          </form>
        </div>
      </div>
    </div>
  </div>







  