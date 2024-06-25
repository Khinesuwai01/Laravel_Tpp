<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Role : {{$role->name}}
                        <a href="{{url('roles')}}" class="btn btn-sm btn-dark float-end" >Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{url('roles/'.$role->id.'/give-permissions')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            @error('permission')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                            @enderror
                            <label for="">Permissions
                                <input mbsc-input id="my-input" data-dropdown="true" data-tags="true" />
                            </label>
                            <div class="row  mt-3 mb-2">
                                @foreach($permissions as $permission)
                                    <div class="col-md-2">
                                        <label>
                                            <select name="" id="multipe-select">
                                                <option value="{{$permission->name}}"></option>
                                            </select>
                                            <input type="checkbox" value="{{$permission->name}}"
                                                   name="permission[]" autocomplete="off"
                                                   {{in_array($permission->id,$rolePermissions) ? 'checked' : ''}}
                                            />
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-sm btn-warning text-white" type="submit">Update</button>
                        </div>
                    </form>
                </div>
                </div>
            
            </div>
            
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"></script>
</html>