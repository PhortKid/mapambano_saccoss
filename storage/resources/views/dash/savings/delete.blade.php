

<div class="modal fade" id="Deletesaving{{$saving->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete saving</h5>
      
      </div>
      <div class="modal-body">
       
       Did you what to delete saving ??
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! html()->form('PUT', route('savings_management.destroy', $saving->id))->open() !!}
        @csrf
        {!! html()->hidden('_method', 'DELETE') !!}
        {!! html()->submit('Delete User')->class('btn btn-danger') !!}
      </div>
      {!! html()->form()->close() !!}
    </div>
  </div>
</div>

