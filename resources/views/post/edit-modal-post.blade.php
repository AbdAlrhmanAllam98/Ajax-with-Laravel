<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" id="edit-post">
                @csrf
                <input type="hidden" name="edit-id" id="edit-id">
                <div class="form-group">
                    <label for="edit-title">Title</label>
                    <input type="text" name="edit-title" id="edit-title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="edit-content">Content</label>
                    <input type="text" name="edit-content" id="edit-content" class="form-control">
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>            
        </div>
      </div>
    </div>
</div>