@extends('layout')

@section('content')
    <div class="card bg-light mb-3 mx-auto" style="width: 85%;">
        <div class="card-header">会員登録</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">メールアドレス</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputUser1">ユーザ名</label>
                    <input type="user" class="form-control" id="exampleInputUser1" name="name" placeholder="User">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">パスワード</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                        placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password-confirm">パスワード(確認)</label>
                    <input type="password" class="form-control" id="password-confirm" name="password-confirmation"
                        placeholder="Password-confirm">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    @endsection
