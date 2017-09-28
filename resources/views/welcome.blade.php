@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <h1>Welcome to the blog</h1>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">

                    @if(isset($list))
                        @foreach($list as $item)
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">  {{ $item['post_title'] }}</div>

                                    <div class="panel-body">


                                        <div> {{ $item['post_text'] }} </div>
                                        <div><img src="/images/{{ $item['image'] }}" class="img-icon"></div>
                                        <br>


                                        {{--@if(isset($show) )--}}

                                            {{--<a href="{{route($show,$item['id'])}}">--}}
                                                {{--<button class="btn btn-default"><span--}}
                                                            {{--class="glyphicon glyphicon-eye-open"></span>--}}
                                                {{--</button>--}}
                                            {{--</a>--}}
                                            {{--<a href="{{route($edit,$item['id'])}}">--}}
                                                {{--<button class="btn btn-default"><span--}}
                                                            {{--class="glyphicon glyphicon-edit"></span>--}}
                                                {{--</button>--}}
                                            {{--</a>--}}
                                            {{--<a class="btn btn-default" onclick="return confirm('Are you sure?')"--}}
                                               {{--href="{{route('app.posts.destroy', $item['id'])}}"><span--}}
                                                        {{--class="glyphicon glyphicon-trash"></span>--}}
                                            {{--</a>--}}

                                        {{--@endif--}}


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection
