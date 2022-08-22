<!-- Add form -->
<div class="add-new-form add-new-data">
  <div class="form-header">
    <h3>Create New Car</h3>
    <div class="close-icon"></div>
  </div>
  <form method="POST" id="category_form" action="/cars" accept-charset="UTF-8" onSubmit="return validate('');">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="date_exist">
    <input type="hidden" id="date_greater">
    <div class="form-height-control">
      <div style="color:red" id="form-errors">
      </div>

        <div class="form-line">
            <span id="date-exist">Category: *</span>
            <select name="cats" id="cats" class="">
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
            <input type="text" name="job_title" id="job_title" class="" placeholder="Car Name">
        </div>

        <div class="form-line">
            <span id="date-greater">Color: *</span>
            <input type="text" name="color" id="color" class="" placeholder="Color">
        </div>

        <div class="form-line">
            <span id="date-greater">Model: *</span>
            <input type="text" name="model" id="model" class="" placeholder="Model">
        </div>

        <div class="form-line">
            <span id="date-greater">Make: *</span>
            <input type="text" name="make" id="make" class="" placeholder="Make">
        </div>

        <div class="form-line">
            <span id="date-greater">Registration No: *</span>
            <input type="text" name="registration" id="registration" class="" placeholder="Registration No">
        </div>

    </div>
    <div class="form-footer">
      <a href="javascript:void(0)" class="cancel-button">Cancel</a>
      <input type="submit" class="save-changes" value="Save Changes" />
    </div>
  </form>
</div>
