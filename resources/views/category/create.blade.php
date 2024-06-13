<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello Create Page</h1>
    <form action="store" method="POST">
        @csrf
        @method('patch')
        <label for="">Name</label>
        <input type="text" name="name">
        <button>Create</button>
    </form>
</body>
</html>