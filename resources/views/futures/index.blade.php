@extends('layout')

@section('content')
<h5>ゴールまでの道のり</h5>
<div class="ml-5">
  <a href="{{ route('futures.create') }}" class="btn btn-primary">タスクを設定する</a>
</div>

  <div class="nav-image">
  <ul>

    <li class="nav-list">
      <img src="image/goal.png" width="60" height="60" alt="">
      <span class="nav-text">{{ $ideals->title }}</span>
    </li>
    @foreach($futures as $future)
    <li class="nav-list">
      <img src="image/footblack.png" width="80" height="80" alt="">
      <span class="nav-text">{{ $future->title }}</span>
      <a href="{{ route('futures.edit',['future_id' => $future -> id]) }}" class="btn btn-primary">編集</a>
      <form action="{{ route('futures.delete',['future_id' => $future -> id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除" class="btn btn-primary">
      </form>
    </li>
    @endforeach
    <li class="nav-list">
      <img src="image/start.png" width="60" height="60" alt="">
      <span class="nav-text">宣言した日：{{ $ideals->declaration }}</span>
    </li>
  </ul>
  </div>

<script>
const lists = document.querySelectorAll(".nav-list");
const texts = document.querySelectorAll(".nav-text");

lists.forEach(function(list){
  texts.forEach(function(text){
    text.style.display="none";
    list.addEventListener('click',()=>{
    
    if(text.style.display=="block"){
      text.style.display="none";
    }else{
      text.style.display="block";
    }
    });
  })
})
 
</script>

@endsection