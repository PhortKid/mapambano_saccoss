<div class="modal fade " id="EditExpense{{$expense->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">EDIT EXPENSE</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
      {!! html()->form('PUT', route('expenses_management.update', $expense->id))->open() !!}
      <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Expense Description</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText"  name="expense_description" value="{{$expense->expense_description}}">
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Debit</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="debit"  value="{{$expense->debit}}" >
                </div>
                </div>
     @csrf
                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Credit</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="credit" value="{{$expense->credit}}">
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">DATE</label>
                <div class="col-sm-10">
                    <input type="date"  class="form-control" id="inputText" name="date" value="{{$expense->date}}">
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







  