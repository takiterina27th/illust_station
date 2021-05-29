<div class="comment__media">
    <div class="comment__media-body comment__body">
        <div class="row">
            <span class="comment__body-user">{{ $comment->user->name }}</span>
            <span class="comment__body-time">{{ $comment->created_at }}</span>
        </div>
        <span class="comment__body-content">
            {{ $comment->comment }}
        </span>
    </div>
</div>