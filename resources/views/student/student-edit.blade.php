<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3> Edit Students <br>
                            <a href="{{ url('students')}}" class="btn btn-dark float-end">Back</a>
                        </h3>
                    </div>
                    <div class="card-body mt-5">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
                        </div>
                        <div class="form-group">
                            <label for="degree">Degree</label>
                            <input type="text" class="form-control" id="degree" name="degree" value="{{ $student->degree }}" required>
                        </div>

                        <div class="form-group">
                            <label for="courses">Courses</label>
                            <select name="courses[]" id="courses" class="form-control" multiple>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" {{ in_array($course->id, $student->courses->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
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