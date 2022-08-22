@extends('layouts.ques')
@section('content') 
<div class="banner">
                <div class="leaderboard">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="leaderboard-inner">
                                    <h2><span><i class="fa fa-star" aria-hidden="true"></i></span>Monthly Leaderboard</h2>
                                    <form>
                                        <div class="form-group">
                                            <span class="search-by">
                                            <img src="images/search-icon.png" alt="">
                                            </span>
                                            <input type="text" class="form-control" id="username" placeholder="Search by Username" name="username" onkeyup="javascript:searchonkeypress(this.value);">
                                        </div>
                                    </form>
                                    <div class="table-responsive" id="tbl1">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <td>Rank</td>
                                                    <td>Username</td>
                                                    <td>Reg. Pts</td>
                                                    <td>Level</td>
                                                    <td>Super Pts</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $cot = 0;?>
                                            @if(count($month_res)==0)
                                            <tr>
                                                    <td colspan="5"><center>{{ (!empty($res_msg)) ? $res_msg : "No Data Found!!!" }}</center></td>
                                                </tr>
                                            @else
                                            @foreach($month_res as $user)
                                            <?php $cot++;?>
                                                <tr>
                                                    <td>{{ $cot }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $regular_points[$user->id] }}</td>
                                                    <td>@if($regular_points[$user->id] <= 100) Freshman @elseif($regular_points[$user->id] > 100 and $regular_points[$user->id] <= 200) Graduate @elseif($regular_points[$user->id] >= 300) PHD @endif</td>
                                                    <td><?php echo floor($regular_points[$user->id]/100); ?></td>
                                                </tr>
                                            @endforeach 
                                            @endif   
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>Season 1 Scores ({{ $one_monthago }} - {{ $current_month }})</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="leaderboard-inner super-points">
                                    <h2><span><i class="fa fa-star" aria-hidden="true"></i></span>Super Points Leaderboard</h2>
                                    <form>
                                        <div class="form-group">
                                            <span class="search-by">
                                            <img src="images/search-icon.png" alt="">
                                            </span>
                                            <input type="text" class="form-control" id="username" placeholder="Search by Username" name="username" onkeyup="javascript:searchonkeypressall(this.value);">
                                        </div>
                                    </form>
                                    <div class="table-responsive" id="tbl2">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <td>Rank</td>
                                                    <td>Username</td>
                                                    <td>Reg. Pts</td>
                                                    <td>Level</td>
                                                    <td>Super Pts</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $cot = 0;?>
                                            @if(count($reports)==0)
                                                <tr>
                                                    <td colspan="5"><center>{{ (!empty($res_msg)) ? $res_msg : "No Data Found!!!" }}</center></td>
                                                </tr>
                                            @else
                                            @foreach($reports as $user)
                                            <?php $cot++;?>
                                                <tr>
                                                    <td>{{ $cot }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->total_regular_points }}</td>
                                                    <td>@if($user->total_regular_points <= 100) Freshman @elseif($user->total_regular_points > 100 and $user->total_regular_points <= 200) Graduate @elseif($user->total_regular_points >= 300) PHD @endif</td>
                                                    <td>{{ $user->total_superpoint }}</td>
                                                </tr>
                                            @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>All Time Scores</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection