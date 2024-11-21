<div class="modal fade " id="DeleteLoans{{$loan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">DELETE LOAN</h5>
          <button type="button" class="battan-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
        </div>
        
        <div class="modal-body">
       
       Did you what to delete Loan ??
  
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          {!! html()->form('PUT', route('loans_management.destroy', $loan->id))->open() !!}
        @csrf
        {!! html()->hidden('_method', 'DELETE') !!}
        {!! html()->submit('Delete Loan')->class('btn btn-danger') !!}
       
          </form>
        </div>
      </div>
    </div>
  </div>
