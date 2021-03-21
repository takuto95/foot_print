@extends('layout')

@section('content')
  @if(Auth::check())
    <div class="card-deck mx-3">
      <div class="card">
        <div class="card-header">
          <h4>{{ Auth::user()->name }}さん。ようこそ！</h4>
        </div>

        <div class="card bg-light mb-3 mt-3">
          <div class="card-body">
            <h4>会社目標:</h4>
            @if($companies->isEmpty()) 
            <p>会社のゴールを設定してください。</p>
            <a href="{{ route('companies.create') }}" class="btn btn-danger mb-3" >ゴールを設定する</a>
            @else
            @foreach($companies as $company)
            <h5>{{ $company->title }}</h5>
            @endforeach
            <a href="{{ route('companies.edit')}}" class="btn btn-danger mb-3" >ゴールを再設定する</a>
            @endif
          </div>

          <div class="card-body">
            <h4>チーム目標:</h4>
            @if($teams->isEmpty()) 
            <p>チームのゴールを設定してください。</p>
            <a href="{{ route('teams.create') }}" class="btn btn-danger mb-3" >ゴールを設定する</a>
            @else
            @foreach($teams as $team)
            <h5>{{ $team->title }}</h5>
            @endforeach
            <a href="{{ route('teams.edit')}}" class="btn btn-danger mb-3" >ゴールを再設定する</a>
            @endif
          </div> 
        </div>

        <div class="card bg-light mb-3">  
          @if($ideals->isEmpty())
          <div class="card-body">
          <h4>個人目標:</h4>
          <p>個人のゴールを設定してください。</p>
          </div>
          <a href="{{ route('ideals.create') }}" class="btn btn-danger mb-3" >ゴールを設定する</a>
          @else
          <div class="card-body">
          <h4>個人目標：</h4>
          @foreach($ideals as $ideal)
          <h5>　　　期日： {{ $ideal->limit }}まで</h5>
          <h5>　　ゴール： {{ $ideal->title }}</h5>
          @endforeach
          @foreach($indexs as $index)
          <h5>３つの方針：①　{{ $index->content1 }}【自身度：{{ $index->index_statuses()->first()->status1 }}】</h5>
          <h5>３つの方針：②　{{ $index->content2 }}【自身度：{{ $index->index_statuses()->first()->status2 }}】</h5>
          <h5>３つの方針：③　{{ $index->content3 }}【自身度：{{ $index->index_statuses()->first()->status3 }}】</h5>
          @endforeach
          <a href="{{ route('ideals.edit')}}" class="btn btn-danger mb-3" >ゴールを再設定する</a>
          </div>
          @endif
        </div>
      </div>
    </div> 
  @else
    <div class="card text-center mx-auto" style="width: 90%;">
      <div class="card-body">
        <h2 class="card-title mb-5">あなたは目標管理ができていますか？</h2>
        <h3 class="card-text mb-5">目標を達成するために３つのお手伝いをします</h3>
        <div class="card-group">
          <div class="card">
            <div class="card-header text-white bg-danger"><h4>目標を可視化します</h4></div>
            <div class="card-body">
              <div class="card-title"><h5>会社・チーム・個人の３つ目標を作成できます</h5></div>
              <img class="card-img-top mb-3" src="image/goalimage.png" alt="Card image cap" >
              <div class="card-title"><h5>個人目標は期日・達成する三つの方針でさらに明確にします</h5></div>
              <img class="card-img-top" src="image/goalcontent.png" alt="Card image cap" >
            </div>
          </div>
          <div class="card">
            <div class="card-header text-white bg-danger"><h4>目標までの足跡タスクをつけられます</h4></div>
            <div class="card-body">
            <div class="card-title"><h5>足跡の追加で目標までの進捗を確認できます</h5></div>
            <img class="card-img-top mb-3" src="image/taskimage.png" alt="Card image cap">
            <div class="card-title"><h5>足跡一覧でタスクを管理します</h5></div>
            <img class="card-img-top" src="image/taskkanri.png" alt="Card image cap" >
            </div>
          </div>
          <div class="card">
            <div class="card-header text-white bg-danger"><h4>目標の振り返りをします</h4></div>
            <div class="card-body">
              <div class="card-title"><h5>目標の報告シートを作成できます</h5></div>
            <img class="card-img-top mb-3" src="image/report.png" alt="Card image cap">
            <div class="card-title"><h5>3つの方針に対して達成度を付け自己評価します</h5></div>
            <img class="card-img-top" src="image/reportcontent.png" alt="Card image cap">
            </div>
          </div>
        </div>
      </div>
    </div>

  @endif
@endsection