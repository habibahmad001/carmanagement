@extends('layouts.quiz')
@section('content')

<section class="banner rules-banner">
            <div class="container">


                <div class="rules">
                    <h1>{{ isset($rules->page_title) ? @$rules->page_title : "No title added Yet" }}</h1>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 rule-block">
                            {!! isset($rules->content) ? @$rules->content : "No Rule content added yet" !!}
                            
                           
                        </div>
                        
                    </div>
                </div>

            </div>
        </section>
@endsection