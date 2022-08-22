<!-- Add form -->
<div class="add-new-form edit-current-data">
  <div class="form-header">
    <h3>Edit Cars</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="category_form" action="/car-update" accept-charset="UTF-8" onSubmit="return validate('edit-');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="cars_id" id="edit-cars_id" value="">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>

        <div class="form-line">
            <span id="date-exist">Category: *</span>
            <select name="cats" id="edit-cats">
                <option value="">--- Select One ---</option>
                @if(count($catres) > 0)
                    @foreach($catres as $cat)
                        <option value="{!! $cat->id !!}">{!! $cat->category !!}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-line">
            <span id="date-greater">Car Name: *</span>
            <input type="text" name="job_title" id="edit-job_title" placeholder="Car Name">
        </div>

        <div class="form-line">
            <span id="date-greater">Color: *</span>
            <input type="text" name="color" id="edit-color" placeholder="Color">
        </div>

        <div class="form-line">
            <span id="date-greater">Model: *</span>
            <input type="text" name="model" id="edit-model" placeholder="Model">
        </div>

        <div class="form-line">
            <span id="date-greater">Make: *</span>
            <input type="text" name="make" id="edit-make" placeholder="Make">
        </div>

        <div class="form-line">
            <span id="date-greater">Registration No: *</span>
            <input type="text" name="registration" id="edit-registration" placeholder="Registration No">
        </div>


    </div>
    <div class="form-footer">
      <a href="javascript:void(0)" class="cancel-button">Cancel</a>
      <input type="submit" class="save-changes" value="Save Changes" />
    </div>
  </form>
</div>
