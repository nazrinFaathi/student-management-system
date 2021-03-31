@include('layout.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>Edit Student</h3>
    </div>
    <form name="create_student" role="form" method="post" action="{{route('update-student', ['id' => $student->student_id])}}" >
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Name<span>*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}" placeholder="Name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Age<span>*</span></label>
                    <input type="text" name="age" id="age" class="form-control" value="{{$student->age}}" placeholder="Age">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Gender<span>*</span></label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="">Choose...</option>
                        <option value="M" @if($student->gender == "M") selected @endif>Male</option>
                        <option value="F" @if($student->gender == "F") selected @endif>Female</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Reporting Teacher<span>*</span></label>
                    <select class="form-control" name="teacher_id" id="teacher">
                        <option value="">Choose...</option>
                        @foreach($teachers as $teacher)
                        <option value="{{ $teacher->teacher_id }}" @if($student->teacher_id == $teacher->teacher_id) selected @endif>{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" name="create" id="create" class="form-submit btn btn-success" value="Create" />
        </div>
    </form>
</div>
