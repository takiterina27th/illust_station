@extends('layouts.app')

@section('content')

<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザー登録内容の変更</div>
        <div class="card-body">
          <form method="" action="">
          @csrf
            <div class="form-group">
              <label for="name">
                名前
              </label>
              <div>
                <input type="text" name="name" class="form-control" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="email">
                email
              </label>
              <div>
                <input type="text" name="email" class="form-control" value="">
              </div>
              <button type="submit" class="btn btn-primary mt-5">変更する</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection