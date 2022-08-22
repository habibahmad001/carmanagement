<!-- Add form -->
<div class="add-new-form edit-current-data">
  <div class="form-header">
    <h3>Edit Question</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="category_form" action="/question-update" accept-charset="UTF-8" onSubmit="return validate('edit-');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="question_id" id="question_id" value="">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>

       
      <div class="form-line">
        <textarea name="question" id="edit-question" placeholder="Write Your question here"></textarea>
      </div>

      <div class="form-line">
       <input type="text" name="answer" id="edit-answer" placeholder="Answer">
      </div>

      <div class="form-line">
        <select name="level" id="edit-level">
          <option value="" selected="selected">Select Level</option>
          @foreach ($levels as $level)
            <option value="{{ $level->id }}">{{ $level->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-line">
        <select name="category" id="edit-category">
          <option value="" selected="selected">Select Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category }}</option>
          @endforeach
        </select>
      </div>

      

    </div>
    <div class="form-footer">
      <a href="javascript:void(0)" class="cancel-button">Cancel</a>
      <input type="submit" class="save-changes" value="Save Changes" />
    </div>
  </form>
</div>