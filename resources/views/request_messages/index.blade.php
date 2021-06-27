@extends('layouts.app')

@section('content')
<!-- <table>
    <tr>
        <th>タイトル</th>
        <th>メッセージ</th>
        <th>送信者</th>
    </tr>
@foreach($requestsToUser as $request)
    <tr>
        <td>{{ $request->title }}</td>
        <td>{{ $request->body }}</td>
        <td>{{ $request->fromUser->name }}</td>
    </tr>
@endforeach
</table> -->


<!-- <br><br>

送信済みメッセージ
<table>
    <tr>
        <th>タイトル</th>
        <th>メッセージ</th>
        <th>宛先</th>
    </tr>
@foreach($requestsFromUser as $request)
    <tr>
        <td>{{ $request->title }}</td>
        <td>{{ $request->body }}</td>
        <td>{{ $request->toUser->name }}</td>
    </tr>
@endforeach
</table> -->

<div class="request-tab col-md-8">
    <input id="receive_request" type="radio" name="tab_item" checked>
    <label class="request-tab__item" for="receive_request">受信リクエスト</label>
    <input id="send_request" type="radio" name="tab_item">
    <label class="request-tab__item" for="send_request">送信リクエスト</label>
    <div class="request-tab__content" id="receive_request_content">
        <div class="request">
            <div class="request__area">
                <div class="font-weight-bold text-center">
                    あなたへのリクエスト
                </div>
                @foreach($requestsToUser as $request)
                    @include('request_messages.request_message')
                @endforeach
            </div>
        </div>
    </div>
    <div class="request-tab__content" id="send_request_content">
        <div vlass="request">
            <div class="request__area">
                <div class="font-weight-bold text-center">
                    送信済みリクエスト
                </div>
                @foreach($requestsFromUser as $request)
                    @include('request_messages.request_message')
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection