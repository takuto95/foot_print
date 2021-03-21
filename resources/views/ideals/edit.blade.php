@extends('layout')

@section('styles')
    @include('share.flatpickr.styles')
@endsection

@section('content')
    <div class="card bg-light mb-3 mx-auto" style="width: 85%;">
        <div class="card-header">将来のゴールを再設定する</div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('ideals.edit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">ゴール</label>
                    <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="form-group">
                    <label for="content1">達成するための３つの方針①</label>
                    <input type="text" class="form-control" name="content1" id="content1" />
                    <label for="status1">自信度</label>
                    <select id="status1" name="status1" class="form-control">
                        <option>絶対達成できそう</option>
                        <option>なんとかできそう</option>
                        <option>絶対無理</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content2">達成するための３つの方針②</label>
                    <input type="text" class="form-control" name="content2" id="content2" />
                    <label for="status2">自信度</label>
                    <select id="status2" name="status2" class="form-control">
                        <option>絶対達成できそう</option>
                        <option>なんとかできそう</option>
                        <option>絶対無理</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="content3">達成するための３つの方針③</label>
                    <input type="text" class="form-control" name="content3" id="content3" />
                    <label for="status3">自信度</label>
                    <select id="status3" name="status3" class="form-control">
                        <option>絶対達成できそう</option>
                        <option>なんとかできそう</option>
                        <option>絶対無理</option>
                    </select>
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
