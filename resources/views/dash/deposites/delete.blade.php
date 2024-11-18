

<div class="modal fade" id="Deletedeposite{{$deposite->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete deposite</h5>
      
      </div>
      <div class="modal-body">
       
       Did you what to delete deposite ??
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {!! html()->form('PUT', route('deposites_management.destroy', $deposite->id))->open() !!}
        @csrf
        {!! html()->hidden('_method', 'DELETE') !!}
        {!! html()->submit('Delete User')->class('btn btn-danger') !!}
      </div>
      {!! html()->form()->close() !!}
    </div>
  </div>
</div>

