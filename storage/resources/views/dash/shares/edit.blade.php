

<div class="modal fade" id="EditShare{{$share->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit  Shares</h5>
      
      </div>
      <div class="modal-body">
      {!! html()->form('PUT', route('shares_management.update', $share->id))->open() !!}
      <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Properties No</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText"  name="properties_no"  value="{{$share->properties_number}}" required>
                </div>
                </div>

                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">PaidIn</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="paid_in" value="{{$share->paid_in}}" required>
                </div>
                </div>
     @csrf
                <div class="mb-3 row">
                <label for="inputText" class="col-sm-2 col-form-label">Withdraw</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control" id="inputText" name="withdraw" value="{{$share->withdraw}}" required>
                </div>
                </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit User</button>
        
      </div>
      {!! html()->form()->close() !!}
    </div>
  </div>
</div>






  