@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        All posts will be here for the user personally
                    </div>
                </div>
            </div>

            @foreach($list as $item)
                <div class="col-md-2">

                    {{ $item['post_title'] }}
                    {{ $item['post_text'] }}
                    <img src="/images/{{ $item['image'] }}" class="img-icon">
                    @if(isset($show) )
                        <a href="{{route($show,$item['id'])}}">
                            <button class="btn btn-default">Read</button>
                        </a>
                    @endif
                </div>
            @endforeach

            {{--<img src="/images/1506587993.gif">--}}
            {{--<div class="col-md-2">--}}
            {{--{{ $item['post_title'] }}--}}
            {{--</div>--}}
        </div>
    </div>
@endsection
