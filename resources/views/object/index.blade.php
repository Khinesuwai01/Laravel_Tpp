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
    </div>
    <div class="content mt-3">
      <div class="animated fadeIn">
        <div class="row">
          <div class="col-md-12">
          <a href="{{ route('objects.create')}}" class="btn btn-success mb-5    ">Create</a>

            <div class="card">
              <div class="card-header">
                <strong class="card-title">Data Table</strong>
              </div>
              <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Color</th>
                      <th>Capicity</th>
                      <th>Price</th>
                      <th>Generation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if(is_array($results))
                        @foreach ($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{ $result->name}}</td>
                            @if ($result->data != null)
                            <td>{{ $result->data->color ?? '' }} </td>
                            <td>{{ $result->data->capacity ?? ''}}</td>
                            <td>{{ $result->data->price ?? ''}}</td>
                            <td>{{ $result->data->generation ?? ''}}</td>

                            <td>
                        <a href="{{url('objects/'.$result->id. '/edit')}}"> Edit</a>
                        <form action="" method="POST">
                          @csrf
                          <button>Delete</button>
                        </form>
                        </td>

                            @else
                            <td>N/A</td>
                            @endif
                        </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
      </div><!-- .animated -->
    </div><!-- .content -->
@endsection