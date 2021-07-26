<x-home-master>
    <style>
        .display-comment .display-comment {
            margin-left: 40px
        }
    </style>
    @section('content')
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
            by
            <a href="#">{{$post->user->name}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{\Carbon\Carbon::parse($post['created_at'])->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{'/storage/'.$post->post_image}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$post->body}}</p>



        <blockquote class="blockquote">
            <p class="mb-0"></p>
            <footer class="blockquote-footer">Someone famous in
                <cite title="Source Title">Source Title</cite>
            </footer>
        </blockquote>

        <hr>

        <!-- Comments Form -->
{{--        <div class="card my-4">--}}
{{--            <h5 class="card-header">Leave a Comment:</h5>--}}
{{--            <div class="card-body">--}}
{{--                <form method="post" action="{{route('comment.add')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" name="comment" class="form-control">--}}
{{--                        <input type="hidden" name="post_id" value="$post->id" class="form-control">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-primary">Addcomment</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Single Comment -->
{{--        <div class="media mb-4">--}}
{{--            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">--}}
{{--            --}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <h5>Display Comments</h5>--}}
{{--        @foreach($comments as $comment)--}}
{{--            <div class="display-comment">--}}
{{--                <strong>{{ $comment->user->name }}</strong>--}}
{{--                <p>{{ $comment->comment }}</p>--}}
{{--                <a href="" id="reply"></a>--}}
{{--                <form method="post" action="{{ route('reply.add') }}">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" name="comment" class="form-control" />--}}
{{--                        <input type="hidden" name="post_id" value="{{ $post->id }}" />--}}
{{--                        <input type="hidden" name="comment_id" value="{{ $comment->id }}" />--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                @include('post.partials.replies', ['comments' => $comment->replies])--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--        </div>--}}
{{--    <!-- Comment with nested comments -->--}}
{{--        <div class="card-body">--}}
{{--            <h5>Leave a comment</h5>--}}
{{--            <form method="post" action="{{ route('comment.add') }}">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <input type="text" name="comment" class="form-control">--}}
{{--                    <input type="hidden"  id="post_id" value="{{ $post->id }}">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
    @endsection
</x-home-master>
