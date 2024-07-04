@extends('layout.master')
@section('content')
<div class="breadcrumbs">
      <div class="col-sm-4">
        <div class="page-header float-left">
          <div class="page-title">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="page-header float-right">
          <div class="page-title">
            <ol class="breadcrumb text-right">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Table</a></li>
              <li class="active">Data table</li>
            </ol>
          </div>
        </div>
      </div>
      <form action="{{ route('objects.store')}}" method="POST">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" id=""><br>

        <label for="">Price</label>
        <input type="text" name="data['pirce']" value=""><br>

        <label for="">Color</label>
        <input type="text" name="data['color']" value=""><br>

        <button type="submit">Create</button>
    </form>
</div>
@endsection