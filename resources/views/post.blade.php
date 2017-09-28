@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"> {{ $post_title }}</div>
                    <div class="panel-body">
                        {{ $post_text }}
                        <img src="/images/{{ $image }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection