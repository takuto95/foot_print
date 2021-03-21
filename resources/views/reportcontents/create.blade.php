@extends('layout')

@section('content')
    <div class="card bg-light mb-3 mx-auto" style="width: 85%;">
        <div class="card-header">振り返りシート</div>
        <div class="card-body">
            @foreach ($ideals as $ideal)
                <div class="card-title">ゴール：{{ $ideal->title }}</div>
            @endforeach
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $message)
                        <p>{{ $message }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('reportcontents.create') }}" method="POST">
                @csrf
                @foreach ($contents as $content)
                    <div class="form-group">
                        <p>達成するための３つの方針①:{{ $content->content1 }}</p>
                        <label for="status1">達成度</label>
                        <select id="status1" name="status1" class="form-control">
                            <option>完璧</option>
                            <option>なんとかできた</option>
                            <option>できなかった</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>達成するための３つの方針②:{{ $content->content2 }}</p>
                        <label for="status2">達成度</label>
                        <select id="status2" name="status2" class="form-control">
                            <option>完璧</option>
                            <option>なんとかできた</option>
                            <option>できなかった</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <p>達成するための３つの方針③:{{ $content->content3 }}</p>
                        <label for="status3">達成度</label>
                        <select id="status3" name="status3" class="form-control">
                            <option>完璧</option>
                            <option>なんとかできた</option>
                            <option>できなかった</option>
                        </select>
                    </div>
                @endforeach
                <div class="form-group">
                    <label for="comment">報告コメント</label>
                    <textarea name="comment" cols="80" rows="8" class="form-control" id="comment"></textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    @endsection
