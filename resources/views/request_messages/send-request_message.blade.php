<div class="request__media">
    <div class="request__media-body request__body">
        <div class="row">
            <span class="request__body-title">{{ $request->title }}</span>
            <span class="request__body-user">{{ $request->fromUser->name }}</span>
        </div>
        <span class="request__body-content">
            {!! nl2br(e($request->body)) !!}
        </span>
    </div>
</div>