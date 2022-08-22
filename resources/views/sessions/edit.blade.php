<!-- Add form -->
<div class="add-new-form edit-current-data">
  <div class="form-header">
    <h3>Edit Level</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="category_form" action="/level-update" accept-charset="UTF-8" onSubmit="return validate('edit-');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="level_id" id="level_id" value="">
    <input type="hidden" id="edit-level_already_exist">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>

       
      <div class="form-line">
        <input type="text" name="level" id="edit-level" placeholder="Level Name">
        <span id="edit-level-exist"></span>
        
        
      </div>

      

    </div>
    <div class="form-footer">
      <a href="javascript:void(0)" class="cancel-button">Cancel</a>
      <input type="submit" class="save-changes" value="Save Changes" />
    </div>
  </form>
</div>