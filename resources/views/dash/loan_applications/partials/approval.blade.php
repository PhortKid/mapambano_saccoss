<form action="{{ route('loan_application.approve', $application->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Approval Status:</label>
        <select name="approval" class="form-control">
            <option value="approved">Approve</option>
            <option value="rejected">Reject</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit Approval</button>
</form>
