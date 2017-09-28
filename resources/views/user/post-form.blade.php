@extends('layouts.app')

@section('content')


    <div class="container">

        <form action="{{ route('app.post.store') }}" method="post" enctype="multipart/form-data">


            {{Form::token()}}
            <div class="form-group">
                <label for="post_title">Post title</label>
                <input type="text" class="form-control" id="post_title" aria-describedby="titleHelp"
                       placeholder="Enter title" name="post_title"
                       @if(isset ($post_title)) value="{{ $post_title }}" @endif>
                <small id="titleHelp" class="form-text text-muted">Think of a title that describes the content best
                </small>
            </div>

            <div class="form-group">
                <label for="post_text">Post content</label>

                @if(isset ($post_text))
                <textarea style="resize:none" class="form-control" id="post_text" rows="3" aria-describedby="textHelp"
                          placeholder="Enter text"
                          name="post_text">{{ $post_text }}</textarea>
                    @else
                <textarea style="resize:none" class="form-control" id="post_text" rows="3" aria-describedby="textHelp"
                          placeholder="Enter text"
                          name="post_text"></textarea>
                @endif
                <small id="textHelp" class="form-text text-muted">Tell us more about your post</small>
            </div>

            @if(isset($image))
                <div><img src="/images/{{ $image }}" class="img-icon"></div>
                @endif

            <div class="form-group">
                <label for="image">Upload a picture</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <small id="pathHelp" class="form-text text-muted">Add a picture to represent your post</small>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection