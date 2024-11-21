<div class="modal fade " id="Editsaving{{$saving->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">EDIT SAVING</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
      {!! html()->form('PUT', route('savings_management.update', $saving->id))->open() !!}
      <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Properties No</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText"  name="properties_no"  value="{{$saving->properties_number}}" >
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">PaidIn</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="paid_in" value="{{$saving->paid_in}}" required>
                </div>
                </div>
     @csrf
                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Withdraw</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="withdraw" value="{{$saving->withdraw}}" required>
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">DATE</label>
                <div class="col-sm-10">
                    <input type="date"  class="form-control" id="inputText" name="date" value="{{$saving->date}}">
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







  


