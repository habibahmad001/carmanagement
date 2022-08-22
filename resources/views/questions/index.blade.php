@extends('layouts.app') 
@section('content') 
@include('blocks.sub-header')
@include('blocks.left-menu') 
@include('questions.edit')
@include('questions.create')

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
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Level</th>
                        <th>Category</th>
                       
                    </tr>
                </thead>
                @if(count($questions)) @foreach ($questions as $question)
                <tr>
                    <th class="edit-icon-container"><span class="edit-icon" data-id="{{ $question->id }}"><img src="images/edit-icon.png" alt="" title=""></span></th>
                    <th class="checkbox-container">
                        <input type="checkbox" name="del_question[]" value="{{ $question->id }}" class="checkbox-selector">
                    </th>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->answer }}</td>
                    <td>{{ $question->level['level'] }}({{ $question->level['name'] }})</td>
                    <td>{{ $question->category['category'] }}</td>
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
            Total: <span>{{ $questions->total() }}</span>
        </div>
        <nav aria-label="Page navigation">
            @include('pagination.default', ['paginator' => $questions])
        </nav>
    </div>
</div>
@include('../blocks/delete-form', ['model' => 'question'])
@endsection @section('js_libraries')
<script type="text/javascript" src="{{ asset('js/question.js')}}"></script>
@endsection