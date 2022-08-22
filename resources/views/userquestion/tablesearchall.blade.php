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
        <td colspan="5"><center>No Data Found!!!</center></td>
    </tr>
@else
@foreach($reports as $user)
<?php $cot++;?>
    <tr>
        <td>{{ $cot }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->regular_point }}</td>
        <td>@if($user->regular_point <= 100) Freshman @elseif($user->regular_point > 100 and $user->regular_point <= 200) Graduate @elseif($user->regular_point >= 300) PHD @endif</td>
        <td>{{ $user->superpoint }}</td>
    </tr>
@endforeach 
@endif   
</tbody>
</table>
