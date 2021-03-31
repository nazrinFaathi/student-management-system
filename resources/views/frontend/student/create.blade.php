@include('layout.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>Create Student</h3>
    </div>
    <form name="create_student" role="form" method="post" action="{{route('store-student')}}">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Name<span>*</span></label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Name">
                    <span class="error_text">{{  $errors->first('name') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Age<span>*</span></label>
                    <input type="text" name="age" id="age" class="form-control" value="{{old('age')}}" placeholder="Age">
                    <span class="error_text">{{  $errors->first('age') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Gender<span>*</span></label>
                    <select class="form-control" name="gender" id="gender">
                        <option value="" selected>Choose...</option>
                        <option value="M" @if(old('gender') == 'M' ) selected @endif>Male</option>
                        <option value="F" @if(old('gender') == 'F' ) selected @endif>Female</option>
                    </select>
                    <span class="error_text">{{  $errors->first('gender') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Reporting Teacher<span>*</span></label>
                    <select class="form-control" name="teacher_id" id="teacher">
                        <option value="" selected>Choose...</option>
                        @foreach($teachers as $teacher)
                        <option value="{{ $teacher->teacher_id }}" @if(old('teacher_id') == $teacher->teacher_id ) selected @endif>{{ ucfirst($teacher->name) }}</option>
                        @endforeach
                    </select>
                    <span class="error_text">{{  $errors->first('teacher_id') }}</span>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" name="create" id="create" class="form-submit btn btn-success" value="Create" />
        </div>
    </form>
</div>
