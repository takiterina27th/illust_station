@extends('layouts.app')

@section('content')
<table>
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
</table>
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
@endsection