<div class="request__media">
    <div class="request__media-body request__body">
        <div class="row">
            <span class="request__body-title">{{ $request->title }}</span>
            <span class="request__body-user">{{ $request->fromUser->name }}</span>
        </div>
        <span class="request__body-content">
            {!! nl2br(e($request->body)) !!}
        </span>
        <div class="request__response">
            <a href="{{ route('posts.create') }}">
                <button type="button" class="btn font-weight-bold button-design">このリクエストに応える</button>
            </a>
        </div>
    </div>
</div>