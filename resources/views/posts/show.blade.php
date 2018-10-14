@if($posts != null && $posts->count() > 0)
    @foreach($posts as $post)
        <h1 class="post-title">{{$post->title}}</h1>
        <div class="post-text">
            {{$post->title}}
        </div>
    @endforeach
@endif