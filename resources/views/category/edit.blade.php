<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello Edit Page</h1>
    <form action="{{url('/category/'.$data->id)}}" method="POST" value="">
        @csrf
        @method('patch')
        <label for="">Name</label>
        <input type="text" name="name" value="{{$data->name}}">
        <button>Update</button>
    </form>
</body>
</html>