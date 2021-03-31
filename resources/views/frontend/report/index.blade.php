@include('layout.app')
<div class="container">
    <div class="page-header text-center">
        <h3>Manage Report</h3>
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
                    <th scope="col">Maths</th>
                    <th scope="col">Science</th>
                    <th scope="col">History</th>
                    <th scope="col">Term</th>
                    <th scope="col">Total Marks</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                <tr>
                    <th scope="row">{{ $report->report_id }}</th>
                    <td>{{ $report->student && $report->student->name ? ucfirst($report->student->name) : '' }}</td>
                    <td>{{ $report->maths ? $report->maths : '--' }}</td>
                    <td>{{ $report->science ? $report->science : '--' }}</td>
                    <td>{{ $report->history ? $report->history : '--' }}</td>
                    <td>{{ $report->term }}</td>
                    <td>{{ $report->total_marks }}</td>
                    <td>{{ date('M D, Y m:s A', strtotime($report->created_at))}}</td>
                    <td>
                        <a href="{{ route('edit-report', ['id' => $report->report_id]) }}">
                            <span><strong class="text-primary">Edit</strong></span>
                        </a>
                        <a href="{{ route('delete-report', ['id' => $report->report_id]) }}">
                            <span><strong class="text-danger">Delete</strong></span>
                        </a>
                    </td>
                </tr>
                @endforeach
                @if(!$reports->count() > 0)
                <tr>
                    <td colspan="7">No records found.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
