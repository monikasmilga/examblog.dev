@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($list as $item)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">  {{ $item['post_title'] }}</div>

                        <div class="panel-body">
                            {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                            {{--</div>--}}
                            {{--@endif--}}


                            <div> {{ $item['post_text'] }} </div>
                            <div><img src="/images/{{ $item['image'] }}" class="img-icon"></div>
                            <br>


                            @if(isset($show) )

                                <a href="{{route($show,$item['id'])}}">
                                    <button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span>
                                    </button>
                                </a>
                                <a href="{{route($edit,$item['id'])}}">
                                    <button class="btn btn-default"><span class="glyphicon glyphicon-edit"></span>
                                    </button>
                                </a>
                                <a class="btn btn-default" onclick="return confirm('Are you sure?')"
                                   href="{{route('app.posts.destroy', $item['id'])}}"><span
                                            class="glyphicon glyphicon-trash"></span>
                                </a>

                            @endif


                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {},
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('Error');
                }
            });
        }
    </script>
@endsection