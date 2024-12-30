

<div class="modal fade" id="EditUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
      </div>
      {!! html()->form('PUT', route('users_management.update', $user->id))->open() !!}
      <div class="modal-body">

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Firstname:</label>
          <input type="text" class="form-control" id="recipient-name" name="firstname" value="{{$user->firstname}}">
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Middlename:</label>
          <input type="text" class="form-control" id="recipient-name"name="middlename" value="{{$user->middlename}}">
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Lastname:</label>
          <input type="text" class="form-control" id="recipient-name" name="lastname" value="{{$user->lastname}}">
        </div>

        @csrf
        {!! html()->hidden('_method', 'PUT') !!}

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Phone number:</label>
          <input type="text" class="form-control" id="recipient-name" name="phone_number" value="{{$user->phone_number}}">
        </div>

        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Email:</label>
          <input type="text" class="form-control" id="recipient-name" name="email" value="{{$user->email}}">
        </div>

        <div class="form-group">
          <label for="gender" class="col-form-label">Gender</label>
          <select name="gender" class="form-control">
            <option selected="true">{{$user->gender}}</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>

        <div class="form-group">
          <label for="role" class="col-form-label">Role</label>
          <select name="role" class="form-control">
            <option selected="true">{{$user->role}}</option>
            <option value="Admin">Admin</option>
            <option value="secretary">Secretary</option>
            <option value="chair_man">Chair man</option> 
            <option value="Applicant">Applicant</option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <!-- Corrected data-dismiss value to 'modal' -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit User</button>
      </div>
      {!! html()->form()->close() !!}
    </div>
  </div>
</div>







  