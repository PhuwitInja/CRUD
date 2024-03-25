<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Informatic List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12">
                <h2>Student List</h2>
            </div>
            <div>
                <a href="{{ route('info.create') }}" class="btn btn-success">Create Student</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Student Address</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                            <form action="{{ route('info.destroy', $student->id) }}" method="POST">
                                <a href="{{ route('info.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if(isset($students) && !empty($students))
                {!! $students->links('pagination::bootstrap-5') !!}
            @endif


        </div>
    </div>

</body>
</html>
