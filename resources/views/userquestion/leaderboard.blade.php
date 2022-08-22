@extends('layouts.quiz')
@section('content')

<section class="banner leaderboard-banner">
            <div class="leaderboard-container">
                <h1>Leaderboard</h1>
                <div class="row">
                    <div class="col-md-7">
                        
                        <h3>Points</h3>
                        <div class="table-inner table-responsive default-box-shadow">
                            <table class="" id="current_session">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Points</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $cot = 0;?>
                                    @if(count($month_res)==0)
                                    <tr>
                                            <td colspan="4"><center>{{ (!empty($res_msg)) ? $res_msg : "No Data Found!!!" }}</center></td>
                                        </tr>
                                    @else
                                    @foreach($month_res as $user)
                                    <?php $cot++;?>

                                    <tr @if(Auth::user()->username==$user->username)class="active"@endif>
                                        <td>{{ $cot }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->user_level }}</td>
                                        <td>{{ $user->regular_point }}</td>
                                    </tr>
                                    @endforeach 
                                    @endif   
                                   
                                </tbody>
                            </table>
                        </div>
                        <h3 class="super-points-heading">Super Points</h3>
                        <div class="table-inner table-responsive default-box-shadow">
                            <table class="" id="overall_session">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Points</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cot = 0;?>
                                    @if(count($reports)==0)
                                        <tr>
                                            <td colspan="4"><center>{{ (!empty($res_msg)) ? $res_msg : "No Data Found!!!" }}</center></td>
                                        </tr>
                                    @else
                                    @foreach($reports as $user)
                                    <?php $cot++;?>
                                    <tr @if(Auth::user()->username==$user->username)class="active"@endif>
                                        <td>{{ $cot }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->user_level }}</td>
                                        <td>{{ $user->total_superpoint }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        
                        <h3>Recent Answers</h3>
                        
                        @if(count($scores)==0)
                         
                         <div class="buttons-info recent-answers-ready">
                            <span>You did not take a quiz today !!</span>
                        </div>
                         
                        @else
                         <?php $cot = 1;?>
                        @foreach($scores as $score)
                           <div class="results-content-block">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 no-padding-right">
                                        <span class="gradient question-number">{{ $cot }}</span>
                                    </div>
                                    <div class="col-md-10 col-sm-10 no-padding-left">
                                        <p class="question-content">{{ $score->question }}</p>
                                        <p>Your Answer: <span class="marks"><strong>{{ $score->answer }}</strong></span></p>
                                    </div>
                                </div>
                            </div> 
                            <?php $cot++?>
                        @endforeach
                       
                        @endif

                        
                    </div>
                </div>
            </div>
        </section>

@endsection