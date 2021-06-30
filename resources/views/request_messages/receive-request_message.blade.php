<div class="request-messages__media">
    <div class="request-messages__media-body request-messages__body">
        <div class="row">
            <span class="request-messages__body-title">{{ $request->title }}</span>
            <span class="request-messages__body-user">From:{{ $request->fromUser->name }}</span>
        </div>
        <span class="request-messages__body-content">
            {!! nl2br(e($request->body)) !!}
        </span>
        <div class="request-messages__response">
            <a href="{{ route('posts.create') }}">
                <button type="button" class="btn font-weight-bold button-design">このリクエストに応える</button>
            </a>
        </div>
    </div>
</div>