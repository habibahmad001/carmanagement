@extends('layouts.app')

@section('content')

@include('blocks.sub-header')
@include('blocks.left-menu')


<div class="center-content-area">
  <form method="post" action="{{ URL::to('/post_rule') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="page_id" value="{{ @$rules->id}}">

    <div class="rules_page">

      <div class="form-line">
        <label>Select Location:</label>
        <div class="field-container">
          <select name="where" class="search-where" id="where">
            <option value="where">Where</option>
            @foreach($locres as $location)
              <option value="{{ $location->id }}">{{ $location->location_title }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-line">
        <label>Select Category:</label>
        <div class="field-container">
          <select name="cat_id" class="search-where" id="cat_id">
            <option value="where">Select Category</option>
            @foreach($catres as $categorie)
              <option value="{{ $categorie->id }}">{{ $categorie->category }}</option>
            @endforeach
          </select>
        </div>
      </div>
        <div class="form-line">
          <label>Job Title <span>*</span></label>
          <div class="field-container">
            <input type="text" value="{{ @$rules->page_title}}" name="page_title" id="page_title" placeholder="Page Title" required>
          </div>
        </div>
        <div class="form-line">
          <label>Job Content <span>*</span></label>
          <div class="field-container">
            <textarea name="content" class="summernote">{{ @$rules->content}}</textarea>
          </div>
        </div>
        
      
      <div class="form-footer">
        <div class="button-container">
          <a href="{{ URL::to('/') }}" class="cancel-button">Cancel</a>
          <input type="submit" value="Save Changes" name="submit" class="save-changes">
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
@section('js_libraries')

  <link href="{{ asset('css/summernote.css') }}" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="{{ asset('js/summernote.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
        tabsize: 2
      });
    });
  </script>
  
 



@endsection
