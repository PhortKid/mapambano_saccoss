<div class="modal fade " id="DeleteInterest{{$interest->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">DELETE DEPOSITE</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
       
       Did you what to delete interest ??
      
      

</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {!! html()->form('PUT', route('interest_management.destroy', $interest->id))->open() !!}
        @csrf
        {!! html()->hidden('_method', 'DELETE') !!}
        {!! html()->submit('Delete Interest')->class('btn btn-danger') !!}
       
          </form>
        </div>
      </div>
    </div>
  </div>

