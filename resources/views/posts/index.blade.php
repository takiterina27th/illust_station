@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                    @auth
                    <a href="">
                      <button type="submit" class="btn btn-primary">
                      投稿する
                      </button>
                    </a>
                    @endauth

                    <form method="" action="" class="d-flex">
                      <input class="form-control me-2" name="search" type="search" placeholder="検索する" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit" style="margin-left: 12px;">Search</button>
                    </form>
                    </div>
                    </nav>
                      
                    <table class="table">
                      
                    </table>
                    
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                      
                      <div class="col mb-4">
                        <div class="card h-100">
                          
                          <div class="card-body">
                            <h5 class="card-title">タイトル</h5>
                            <p class="card-text">テキスト</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted">作成者</small>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
