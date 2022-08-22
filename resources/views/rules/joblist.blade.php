@extends('layouts.app')
@section('content')
@include('blocks.sub-header')
@include('blocks.left-menu')
@include('categories.edit')
@include('rules.create')

<!-- Edit form -->
<div class="center-content-area table-set">
    <div class="table-responsive">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



        <table class="table">
            <tbody class="table">
                <thead>
                    </tr>
                    <tr>
                        <th width="3%" class="edit-icon-container">&nbsp;</th>
                        <th width="2%" class="checkbox-container">
                        </th>
                        <th width="2%">ID</th>
                        <th width="10%">Title</th>
                        <th width="80%">Description</th>
                    </tr>
                </thead>
                @if(count($jobres)) @foreach ($jobres as $job)
                <tr>
                    <th class="edit-icon-container"><span class="edit-icon" data-id="{{ $job->id }}"><img src="images/edit-icon.png" alt="" title=""></span></th>
                    <th class="checkbox-container">
                    </th>
                    <td>{{ $job->id }}</td>
                    <td>{{ $job->job_title }}</td>
                    <td>{{ strip_tags($job->job_desc) }}</td>
                </tr>
                @endforeach @else
                <tr>
                    <th colspan="6" class="error">No results found</th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@include('../blocks/delete-form', ['model' => 'category'])
@endsection @section('js_libraries')
<script type="text/javascript" src="{{ asset('js/category.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".add-button").click(function(e){
            window.location.href = "/manage-rules";
        });
    });
</script>
@endsection
