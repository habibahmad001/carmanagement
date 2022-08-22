<!-- Add form -->
<div class="add-new-form add-new-data">
  <div class="form-header">
    <h3>Create New Question</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="question_form" action="/questions" accept-charset="UTF-8" onSubmit="return validate('');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>

       
      <div class="form-line">
        
        <textarea name="question" id="question" placeholder="Write Your question here"></textarea>
        
      </div>

      <div class="form-line">
        
       <input type="text" name="answer" id="answer" placeholder="Answer">
        
      </div>

       <div class="form-line">
        <select name="level" id="level">
          <option value="" selected="selected">Select Level</option>
          @foreach ($levels as $level)
            <option value="{{ $level->id }}">{{ $level->level }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-line">
        <select name="category" id="category">
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