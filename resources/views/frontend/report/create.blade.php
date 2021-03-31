@include('layout.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>Create Report</h3>
    </div>
    <form name="create_student" role="form" method="post" action="{{route('store-report')}}">
    {{ csrf_field() }}
    <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Student<span>*</span></label>
                    <select class="form-control" name="student_id" id="student">
                        <option value="" selected>Choose...</option>
                        @foreach($students as $student)
                        <option value="{{ $student->student_id }}">{{ ucfirst($student->name) }}</option>
                        @endforeach
                    </select>
                    <span class="error_text">{{  $errors->first('student_id') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Term<span>*</span></label>
                    <select class="form-control" name="term" id="term">
                        <option value="" selected>Choose...</option>
                        @foreach($terms as $term)
                        <option value="{{ $term }}">{{ $term }}</option>
                        @endforeach
                    </select>
                    <span class="error_text">{{  $errors->first('term') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h5>Subject</h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Maths</label>
                    <input type="text" name="maths" id="maths" class="form-control" value="" placeholder="Enter the marks for maths">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Science</label>
                    <input type="text" name="science" id="science" class="form-control" value="" placeholder="Enter the marks for science">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>History</label>
                    <input type="text" name="history" id="history" class="form-control" value="" placeholder="Enter the marks for history">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" name="create" id="create" class="form-submit btn btn-success" value="Create Report" />
        </div>
    </form>
</div>
