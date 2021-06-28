@extends('layouts.app')

@section('content')
<div class="request-tab col-md-8">
    <input id="receive_request" type="radio" name="tab_item" checked>
    <label class="request-tab__item" for="receive_request">受信リクエスト</label>
    <input id="send_request" type="radio" name="tab_item">
    <label class="request-tab__item" for="send_request">送信リクエスト</label>
    <div class="request-tab__content" id="receive_request_content">
        <div class="request-messages">
            <div class="request-messages__area">
                <div class="font-weight-bold text-center">
                    あなたへのリクエスト
                </div>
                @foreach($requestsToUser as $request)
                    @include('request_messages.receive-request_message')
                @endforeach
            </div>
        </div>
    </div>
    <div class="request-tab__content" id="send_request_content">
        <div class="request-messages">
            <div class="request-messages__area">
                <div class="font-weight-bold text-center">
                    送信済みリクエスト
                </div>
                @foreach($requestsFromUser as $request)
                    @include('request_messages.send-request_message')
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection