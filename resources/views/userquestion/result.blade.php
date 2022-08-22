@extends('layouts.quiz')
@section('content') 
 <section class="banner questions-banner answer-check-banner">
            <div class="custom-container">
                <!-- <div class="answer-status">
                    <div class="status correct-answer">
                        <span><i class="fa fa-check" aria-hidden="true"></i></span>
                    </div>
                    <div class="status wrong-answer">
                        <span><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                </div> -->
                <div class="banner-image-large">
                    <img src="images/logo-banner-large-img.png" alt="">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if($questions->is_correct==1)
                        <div class="correct-answer">
                            <span><i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                        @endif
                        @if($questions->is_correct==0)
                        <div class="incorrect-answer">
                            <span><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="questions-content">
                                @if($questions->is_correct==0)
                                <p class="answer-rank-incorrect">InCorrect</p>
                                @else
                                <p class="answer-rank-correct">Correct</p>
                                @endif
                                <p>{{ $questions->question }}</p>
                                <div class="answer-content">
                                    <p>Your Answer: <span class="your-answer">{{ $questions->your_answer }}</span></p>
                                    @if($questions->is_correct==0)
                                    <p>Correct Answer: <span class="right-answer">{{ $questions->answer }}</span></p>
                                    @endif
                                </div>
                                <div class="buttons-info">
                                    @if($questions->is_correct==0)
                                    
                                    <a  href="{{ URL::to('/dashboard') }}">My Score</a>
                                    @else
                                     @if($count_question>2)
                                     <a href="javascript:void(0);">You have done today</a>
                                    <a  href="{{ URL::to('/dashboard') }}">My Score</a>

                                    @else
                                    <a href="{{ URL::to('/userquestion') }}">Next Question</a>
                                    
                                    @endif
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

@endsection