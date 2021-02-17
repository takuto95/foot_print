@extends('layout')

@section('content')
@if(Auth::check())
<div class="jumbotron p-4">
  <div class="container">
      ようこそ、{{ Auth::user()->name }}さん
    @if($ideals->isEmpty())
    <div class="panel panel-body">
      理想
      <p>空欄です</p>
      <a href="{{ route('ideal.create') }}" class="btn btn-primary">設定する</a>
    </div>
    @else
    <div class="panel panel-body">
      理想
      @foreach($ideals as $ideal)
      <p>{{ $ideal->limit }}までに</p>
      <p>{{ $ideal->title }}</p>
      @endforeach
      <a href="{{ route('ideal.edit')}}" class="btn btn-primary">編集する</a>
    </div>
    @endif
  </div>
</div>  
@else
<div class="jumbotron p-4">
    <div class="container text-center">
      <h3>あなたの足跡は見えていますか？</h3>
      <p>未来・現在・過去の行動を視覚化します。</p>
      <a href="#" class="btn btn-primary">さっそく始める</a>
    </div>
</div>   
@endif

@endsection