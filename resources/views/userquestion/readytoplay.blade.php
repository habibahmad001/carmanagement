@extends('layouts.quiz')
@section('content') 
<section class="banner quiz-rules-banner">
            <div class="custom-container">
                <div class="row">
                    <div class="col-md-12">


                        <div class="buttons-info">
                            @if($check_test>0)
                            <a class="comeback-tomorrow" href="javascript:void(0);">{{$QuestionMsg}}</a>
                            <a class="comeback-tomorrow" href="{{ URL::to('/score') }}"><span>See Your Score</span></a>
                            @else
                            <a href="{{ URL::to('/userquestion') }}">Ready to take quiz ?</a>
                            @endif
                        </div>

                        <h1>Quiz Rules</h1>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 no-padding-right">
                                        <span class="gradient quiz-rule-number">1</span>
                                    </div>
                                    <div class="col-md-10 col-sm-10 no-padding-left">
                                        <p class="quiz-rule-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 no-padding-right">
                                        <span class="gradient quiz-rule-number">2</span>
                                    </div>
                                    <div class="col-md-10 col-sm-10 no-padding-left">
                                        <p class="quiz-rule-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 no-padding-right">
                                        <span class="gradient quiz-rule-number">3</span>
                                    </div>
                                    <div class="col-md-10 col-sm-10 no-padding-left">
                                        <p class="quiz-rule-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>


                    </div>
                </div>

            </div>
        </section>
@endsection