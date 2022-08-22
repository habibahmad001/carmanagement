<div class="left-menu">
  <ul class="">
    <li @if(collect(request()->segments())->last()=='users') class="active" @endif>
      <a href="{{ URL::to('/users') }}">
        <div class="icon">U</div>
        <div class="icon-detail">Users</div>
      </a>
    </li>
    <li @if(collect(request()->segments())->last()=='categories') class="active" @endif>
      <a href="{{ URL::to('/categories') }}">
        <div class="icon">C</div>
        <div class="icon-detail">Categories</div>
      </a>
    </li>

    <li @if(collect(request()->segments())->last()=='manage-rules') class="active" @endif>
      <a href="{{ URL::to('/admincars') }}">
        {{--manage-rules--}}
        <div class="icon">CP</div>
        <div class="icon-detail">Car Post</div>
      </a>
    </li>


  </ul>
</div>
