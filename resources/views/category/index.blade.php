<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Category Listing</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $d)
    <tr>
      <td>{{$d->id}}</td>
      <td>{{$d->name}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>