@extends('layouts.reset')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 4% 0;">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $page_title }} @if(isset($jobcat)) {{ $jobcat }} @endif</div>

                <div class="panel-body">
                    @if(isset($jobcat))
                        @if(count($jobslist) > 0)
                        <?php $row_count=0;?>
                        <div class="col-md-3 col-divi">
                        @foreach($jobslist as $job)
                            <p><a href="/jobdetail/{{ $job->id }}">{{ $job->job_title }}</a></p>
                            <?php $row_count++;?>
                            @if($row_count%5 == 0)
                                </div>
                                <div class="col-md-3 col-divi">
                            @endif
                        @endforeach
                        @else
                            No Job found in {{ $jobcat }} !!
                        @endif
                    @else
                        <?php $row_count=0;?>
                        <div class="col-md-3 col-divi">
                            @foreach($catdata as $k=>$v)
                                <p>
                                    <a href="/alljobs/{{ $k }}">
                                     @foreach($v as $key=>$val)
                                         {{ $val }} ({{ $key }})
                                     @endforeach
                                    </a>
                                </p>
                                <?php $row_count++;?>
                                @if($row_count%5 == 0)
                                    </div>
                                    <div class="col-md-3 col-divi">
                                @endif
                            @endforeach
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
