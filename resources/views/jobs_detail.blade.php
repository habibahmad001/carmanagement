@extends('layouts.reset')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 4% 0;">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $jobres->job_title }}</div>

                <div class="panel-body">
                    <b>Category</b>: {!! $jobres->categoryOnId->category !!}<br />
                    <b>Name</b>: {!! $jobres->job_title !!}<br />
                    <b>Color</b>: {!! $jobres->color !!}<br />
                    <b>Model</b>: {!! $jobres->model !!}<br />
                    <b>Make</b>: {!! $jobres->make !!}<br />
                    <b>Registration No</b>: {!! $jobres->registration !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
