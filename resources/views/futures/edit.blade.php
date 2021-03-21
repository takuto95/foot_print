@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="card bg-light mb-3 mx-auto" style="width: 85%;">
        <div class="card-header">足跡を編集する</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('futures.edit', ['future_id' => $future->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">足跡名</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="form-group">
                    <label for="detail">詳細</label>
                    <textarea name="detail" cols="80" rows="8" class="form-control" id="detail"></textarea>
                </div>
                <div class="form-group">
                    <label class="due_date">いつまで</label>
                    <input type="text" class="form-control" name="due_date" id="due_date" />
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    @endsection

    @section('scripts')
        @include('share.flatpickr.scripts')
    @endsection
