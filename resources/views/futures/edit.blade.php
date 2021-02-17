@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
      <div class="row">
        <div class="col col-md-offset-3 col-md-6">
          <nav class="panel panel-default">
            <div class="panel-heading">達成するための足跡を編集する</div>
            <div class="panel-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                  @endforeach
                </div>
              @endif
              <form action="{{ route('futures.edit',['future_id' => $future->id ]) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="title">足跡名</label>
                  <input type="text" class="form-control" name="title" id="title" />
                </div>
                <div class="form-group">
                  <label for="detail">足跡の詳細</label>
                  <textarea name="detail" cols="50" rows="5"></textarea>
                </div>
                <div class="form-group">
                  <label class="due_date">いつまでに達成する</label>
                  <input type="text" class="form-control" name="due_date" id="due_date" />
                </div>
                <div class="text-right">
                  <input type="submit" class="btn btn-primary" />
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
  </div>
@endsection

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection