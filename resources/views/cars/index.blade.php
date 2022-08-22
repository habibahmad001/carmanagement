@extends('layouts.app')
@section('content')
@include('blocks.sub-header')
@include('blocks.left-menu')
@include('cars.edit')
@include('cars.create')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet">
<!-- Edit form -->
<div class="center-content-area table-set">
    <div class="table-responsive" style="margin: 3%">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <br />
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>ID #</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Model</th>
                    <th>Make</th>
                    <th>Registration No</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($carres) > 0)
                    @foreach ($carres as $k=>$car)
                        <tr>
                            <td>{!! $k+1!!}</td>
                            <td>{!! $car->categoryOnId->category !!}</td>
                            <td>{!! $car->job_title !!}</td>
                            <td>{!! $car->color !!}</td>
                            <td>{!! $car->model !!}</td>
                            <td>{!! $car->make !!}</td>
                            <td>{!! $car->registration !!}</td>
                            <td><a href="javascript:void(0);"><button type="button" class="btn btn-primary edit-btn" data-id="{!! $car->id !!}">Edit</button></a> <a href="javascript:void(0);"><button type="button" class="btn btn-danger del-btn" data-id="{!! $car->id !!}">Delete</button></a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>


    </div>

</div>
@endsection @section('js_libraries')
<script type="text/javascript" src="{{ asset('js/cars.js')}}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
                <script language="JavaScript">
                    $(document).ready(function () {
                        $('#example').DataTable();
                    });
                </script>
@endsection
