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
                                                    <td colspan="5"><center>No Data Found!!!</center></td>
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