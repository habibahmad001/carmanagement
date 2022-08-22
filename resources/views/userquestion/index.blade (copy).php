@extends('layouts.ques')
@section('content') 
<div class="banner">
    <div class="banner-container">
        <div class="timer">
            <div class="clock left">
                <img src="images/clock-icon.png" alt="">
            </div>
            <div class="timer-clock left">
                <span class="seconds">19</span>
                <span class="timer-in-seconds">Sec</span>
            </div>
            <div class="clear"></div>
        </div>{{ (isset($users[0]->answer))? $users[0]->answer : ""}}
        <div class="questions">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <center><p>@if(!empty($QuestionMsg)) {{ $QuestionMsg }} @else {{ $users[0]->question }} @endif</p></center>
            <form method="POST" action="/saveanswer" name="frm" id="frm">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="qid" id="qid" value="@if(isset($users[0]->id)) {{ $users[0]->id }} @endif">
                <input type="hidden" name="uid" id="uid" value="{{ $uid }}">
                <input type="hidden" name="lev" id="lev" value="{{ $level }}">
                @if(empty($QuestionMsg))
                <input type="text" name="ans" id="ans" required="required" autocomplete="off">
                <button type="submit" name="save" id="save"><img src="{{ asset('images/right-arrow.png') }}" alt=""></button>
                @endif
            </form>
            @if(empty($QuestionMsg))<span class="question-number right">{{ $level }} / 3</span>@endif
            </form>
            <div class="clear"></div>
        </div>
        <div class="answer-status">
            <div class="status correct-answer">
                <span><i class="fa fa-check" aria-hidden="true"></i></span>
            </div>
            <div class="status wrong-answer">
                <span><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</div>
@endsection