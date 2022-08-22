<!-- Add form -->
<div class="add-new-form add-new-data">
  <div class="form-header">
    <h3>Create New Level</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="category_form" action="/level" accept-charset="UTF-8" onSubmit="return validate('');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="level_already_exist">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>

       
      <div class="form-line">
        <input type="text" name="level" id="level" placeholder="level" onkeydown="validateLevelExist('')">
        <span id="level-exist"></span>
        
        
      </div>

      <div class="form-line">
        <input type="text" name="level_name" id="level_name" placeholder="Level Name">
      </div>
      

    </div>
    <div class="form-footer">
      <a href="javascript:void(0)" class="cancel-button">Cancel</a>
      <input type="submit" class="save-changes" value="Save Changes" />
    </div>
  </form>
</div>