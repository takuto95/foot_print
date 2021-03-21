@extends('layout')

@section('content')
    <div class="card bg-light mb-3 mx-auto" style="width: 85%;">
        <div class="card-header">会社のゴールを再設定する</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('companies.edit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">ゴール</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    @endsection