@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">理想像を編集する</div>
            <div class="panel-body">
              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $message)
                    <p>{{ $message }}</p>
                  @endforeach
                </div>
              @endif
              <form action="{{ route('ideal.edit') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="title">未来の理想像</label>
                <input type="text" class="form-control" name="title" id="title" />
              </div>
   
              <div class="form-group">
                <label for="due_date">期限</label>
                <input type="text" class="form-control" name="due_date" id="due_date" />
              </div>
              <div class="text-right">
                <input type="submit" class="btn btn-primary" />
              </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  @include('share.flatpickr.scripts')
@endsection