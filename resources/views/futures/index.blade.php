@extends('layout')

@section('content')
    <div class="card-deck mx-3">
        @if ($ideals)
            @if ($futures)
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <h4>ゴールまでの足跡</h4>
                        <a href="{{ route('futures.create') }}" class="btn btn-danger">足跡を追加する</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#task">足跡一覧</a>
                    </div>
                    <div class="card-body ml-5">
                        <img class="card-img-left mb-3 ml-5" src="image/goal.png" width="60" height="60"
                            alt="Card image cap" data-toggle="tooltip" data-placement="right"
                            title="ゴール：{{ $ideals->title }}">

                        @foreach ($futures as $future)
                            @if ($future->dones()->first())
                                <p><img class="card-img-left mb-3 ml-5" src="image/footred.png" width="60" height="60"
                                        alt="Card image cap" data-toggle="tooltip" data-placement="right"
                                        title="{{ $future->title }}"></p>
                            @else
                                <p><img class="card-img-left mb-3 ml-5" src="image/footblack.png" width="60" height="60"
                                        alt="Card image cap" data-toggle="tooltip" data-placement="right"
                                        title="{{ $future->title }}"></p>
                            @endif

                        @endforeach
                        <p><img class="card-img-left mb-3 ml-5" src="image/start.png" width="60" height="60"
                                alt="Card image cap" data-toggle="tooltip" data-placement="right"
                                title="宣言日：{{ $ideals->declaration }}"></p>
                    </div>
                </div>
            @else
                <div class="card bg-light mb-3">
                    <div class="card-header">
                        <h4>ゴールまでの足跡</h4>
                        <a href="{{ route('futures.create') }}" class="btn btn-danger">足跡を追加する</a>
                    </div>
                    <div class="card-body">
                        <p>足跡が設定されていません、追加してください。</p>
                    </div>
                </div>
            @endif
            <div class="card bg-light mb-3">
                <div class="card-header mb-3">
                    <h4>振り返りボックス</h4>
                    <a href="{{ route('reportcontents.create') }}" class="btn btn-danger">振り返りシートを作成する</a>
                </div>
                @foreach ($reports as $report)
                    <p><a href="#" class="btn btn-danger mx-3 btn-fluid" data-toggle="modal"
                            data-target="#target{{ $report->id }}">{{ $report->declaration }}報告</a></p>
                @endforeach
            </div>
        @else
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <h4>ゴールまでの足跡</h4>
                </div>
                <div class="card-body">
                    <p>目標が設定されていません、設定してください。</p>
                </div>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header">
                    <h4>振り返りボックス</h4>
                </div>
                <div class="card-body">
                    <p>目標が設定されていません、設定してください。</p>
                </div>
            </div>
        @endif
    </div>

    @foreach ($reports as $report)
        <div class="modal fade" id="target{{ $report->id }}" tabindex="-1" role="dialog" aria-labelledby="center"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-fluid" role="document" width="100">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $report->declaration }}報告</h5>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title mb-3">達成するための３つの方針</h5>
                        <p>{{ $report->content1 }}【達成度：{{ $report->report_statuses()->first()->status1 }}】</p>
                        <p>{{ $report->content2 }}【達成度：{{ $report->report_statuses()->first()->status2 }}】</p>
                        <p>{{ $report->content3 }}【達成度：{{ $report->report_statuses()->first()->status3 }}】</p>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title mb-2">報告コメント</h5>
                        <p>{{ $report->comment }}</p>
                    </div>
                    <div class="form-group ml-3">
                        <form action="{{ route('reportcontents.delete', ['reportcontent_id' => $report->id]) }}"
                            method="post" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="削除" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                    <p><button type="button" class="btn btn-danger ml-3" data-dismiss="modal">閉じる</button></p>
                </div>
            </div>
        </div>
    @endforeach


    <div class="modal fade" id="task" tabindex="-1" role="dialog" aria-labelledby="center" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-fluid" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">足跡一覧</h5>
                </div>
                <div class="modal-body">
                    @foreach ($futures as $future)
                        @if ($future->dones()->first())
                            <h5>足跡名：{{ $future->title }}<img src="image/comp.png" width="50" height="50" alt=""></h5>
                        @else
                            <h5>足跡名：{{ $future->title }}</h5>
                        @endif
                        <h5>　詳細：{{ $future->detail }}</h5>
                        <h5>　期限：{{ $future->limit }}</h5>
                        <div class="form-group ml-3">
                            <a href="{{ route('futures.edit', ['future_id' => $future->id]) }}"
                                class="btn btn-danger">編集</a>
                            <form action="{{ route('futures.delete', ['future_id' => $future->id]) }}" method="post"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="削除" class="btn btn-danger">削除</button>
                            </form>
                            @if ($future->dones()->first())
                            @else
                                <form action="{{ route('futures.update', ['future_id' => $future->id]) }}" method="post"
                                    style="display: inline">
                                    @csrf
                                    <button type="submit" value="完了" class="btn btn-danger">完了</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

    </script>
@endsection
