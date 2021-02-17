@extends('layout')

@section('content')
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">会員登録</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
              </div>
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="text" class="form-control" id="password" name="password" />
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード（確認）</label>
                <input type="text" class="form-control" id="password-confirm" name="password-confirmation" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
