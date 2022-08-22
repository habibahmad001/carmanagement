<!-- Add form -->
<div class="add-new-form add-new-data">
  <div class="form-header">
    <h3>Create New Session</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="category_form" action="/sessions" accept-charset="UTF-8" onSubmit="return validate();">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="date_exist">
    <input type="hidden" id="date_greater">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>
      
      
       
      <div class="form-line">
        <input type="text" name="start_date" id="startDate" placeholder="Start date" onchange="validatedateExist()">
        <span id="date-exist"></span>
      </div>

      <div class="form-line">
        <input type="text" name="end_date" id="endDate" placeholder="End date" onchange="checkenddate()">
        <span id="date-greater"></span>
      </div>
      

    </div>
    <div class="form-footer">
      <a href="javascript:void(0)" class="cancel-button">Cancel</a>
      <input type="submit" class="save-changes" value="Save Changes" />
    </div>
  </form>
</div>