@foreach($comments as $comment)
    <div class="display-comment">
        {{-- <strong>{{ $comment->user->name }}</strong> --}}
        <strong>{{ $comment->name }}</strong>
        <p>{{ $comment->comments }}</p>
    </div>
    <hr />
@endforeach