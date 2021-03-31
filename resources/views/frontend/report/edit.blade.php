@include('layout.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h3>Create Report</h3>
    </div>
    <form name="edit_report" role="form" method="post" action="{{route('update-report', ['id' => $report->report_id])}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Student<span>*</span></label>
                    <select class="form-control" name="student_id" id="student">
                        <option value="" selected>Choose...</option>
                        @foreach($students as $student)
                        <option value="{{ $student->student_id }}" @if($report->student_id == $student->student_id) selected @endif>{{ $student->name }}</option>
                        @endforeach
                    </select>
                    <span class="error_text">{{ $errors->first('student_id') }}</span>
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
                        <option value="{{ $term }}"  @if($report->term == $term) selected @endif>{{ $term }}</option>
                        @endforeach
                    </select>
                    <span class="error_text">{{ $errors->first('term') }}</span>
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
                    <input type="text" name="maths" id="maths" class="form-control" value="{{$report->maths ? $report->maths : old('maths')}}" placeholder="Enter the mark for maths">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>Science</label>
                    <input type="text" name="science" id="science" class="form-control" value="{{$report->science ? $report->science : old('science')}}" placeholder="Enter the mark for sience">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label>History</label>
                    <input type="text" name="history" id="history" class="form-control" value="{{$report->history ? $report->history : old('history')}}" placeholder="Enter the mark for history">
                </div>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" class="form-submit btn btn-success" value="Update Report" />
        </div>
    </form>
</div>
