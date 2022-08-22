@extends('layouts.app') 
@section('content') 
@include('blocks.sub-header')
@include('blocks.left-menu') 
@include('levels.edit')
@include('levels.create')

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
                            <input type="checkbox" name="all">
                        </th>
                        <th>Level ID</th>
                        <th>Level Name</th>
                    </tr>
                </thead>
                @if(count($levels)) @foreach ($levels as $level)
                <tr>
                    <th class="edit-icon-container"><span class="edit-icon" data-id="{{ $level->id }}"><img src="images/edit-icon.png" alt="" title=""></span></th>
                    <th class="checkbox-container">
                        <input type="checkbox" name="del_level[]" value="{{ $level->id }}" class="checkbox-selector">
                    </th>
                    <td>{{ $level->id }}</td>
                    <td>{{ $level->name }}</td>
                </tr>
                @endforeach @else
                <tr>
                    <th colspan="6" class="error">No results found</th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <div class="pagination-container">
        <div class="number-container">
            Total: <span>{{ $levels->total() }}</span>
        </div>
        <nav aria-label="Page navigation">
            @include('pagination.default', ['paginator' => $levels])
        </nav>
    </div>
</div>
@include('../blocks/delete-form', ['model' => 'level'])
@endsection @section('js_libraries')
<script type="text/javascript" src="{{ asset('js/level.js')}}"></script>
@endsection