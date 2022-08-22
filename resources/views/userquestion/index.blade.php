@extends('layouts.quiz')
@section('content') 
<section class="banner questions-banner">
    <div class="custom-container">
        <div class="answer-status">
                    <div class="status correct-answer">
                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="status wrong-answer">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                </div>
        <div class="banner-image-large">
            <img src="{{ asset('images/logo-banner-large-img.png') }}" alt="">
        </div>
        <div class="row default-box-shadow quiz-frame">
            <div class="col-md-3">
                <div class="timer">
                    <span class="seconds">19</span>
                    <span class="timer-in-seconds">sec</span>
                </div>
            </div>@if(empty($QuestionMsg)) {{ (isset($users[0]->answer))? $users[0]->answer : ""}} @endif
            <div class="col-md-9">
                <div class="questions-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p>@if(!empty($QuestionMsg)) <br /><br />{{ $QuestionMsg }} @else {{ $users[0]->question }} @endif</p>
                    <form method="POST" action="/saveanswer" name="frm" id="frm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="qid" id="qid" value="@if(isset($users[0]->id)) {{ $users[0]->id }} @endif">
                        <input type="hidden" name="uid" id="uid" value="{{ $uid }}">
                        <input type="hidden" name="lev" id="lev" value="{{ $level }}">
                        <!-- <span class="q-number">|</span> -->
                        @if(empty($QuestionMsg))
                        <input class="default-box-shadow" type="text" placeholder="Enter your answer here!" name="ans" id="ans" required="required" autocomplete="off">
                        <button id="check-btn" type="submit" name="save" id="save"><img src="{{ asset('images/input-btn-img.png') }}" alt=""></button>
                        @endif
                         @if(empty($QuestionMsg))<span class="question-number right">{{ $level }} / 3</span>@endif
                    </form>

                    <div class="info-and-rules">
                                <span href="{{ URL::to('/rules') }}" class="gradient">i</span>
                                <a href="{{ URL::to('/rules') }}">Help..?</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection