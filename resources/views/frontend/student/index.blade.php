@include('layout.app')
<div class="container">
    <div class="page-header text-center">
        <h3>Manage Students</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close" type="button">×</button>
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Reporting Teacher</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->student_id }}</th>
                    <td>{{ ucfirst($student->name) }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->teacher && $student->teacher->name ? ucfirst($student->teacher->name) : '' }}</td>
                    <td>
                        <a href="{{ route('edit-student', ['id' => $student->student_id]) }}">
                            <span><strong class="text-primary">Edit</strong></span>
                        </a>
                        <a href="{{ route('delete-student', ['id' => $student->student_id]) }}">
                            <span><strong class="text-danger">Delete</strong></span>
                        </a>
                    </td>
                </tr>
                @endforeach
                @if(!$students->count() > 0)
                <tr>
                    <td colspan="7">No records found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
