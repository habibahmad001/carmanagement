@extends('layouts.app') 
@section('content') 
@include('blocks.sub-header')
@include('blocks.left-menu') 
@include('sessions.create') 

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
                        
                        <th width="10%" class="checkbox-container">
                        Select date
                        </th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Operation</th>

                    </tr>
                </thead>
                @if(count($sessions)) @foreach ($sessions as $session)
                <tr>
                    
                    <th class="checkbox-container">
                        <input type="radio" @if ($session->status=='active'){{"checked"}} @endif name="status" value="{{ $session->id }}" class="checkbox-selector">
                    </th>
                    <td>{{ $session->start_date->format('d-M-Y')}}</td>
                    <td>{{ $session->end_date->format('d-M-Y')}}</td>
                    <td @if ($session->status=='active') style="font-weight: bold; font-size: 14px; color: red;" @endif >{{ $session->status}}</td>
                    @if ($session->status!='active')
                    <td><a href="/update-session/{{$session->id}}" class="btn btn-success" style="color: black;">Activate</a></td>
                    @endif
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
@endsection @section('js_libraries')
<script type="text/javascript" src="{{ asset('js/session.js')}}"></script>
@endsection