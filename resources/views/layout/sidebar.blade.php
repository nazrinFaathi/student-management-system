<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidenav">
        <a href="{{ route('students') }}"><small>View Students</small></a>
        <a href="{{ route('create-student') }}"><small>Create Student</small></a>
        <a href="{{ route('reports') }}"><small>View Report</small></a>
        <a href="{{ route('create-report') }}"><small>Create Report</small></a>
    </div>
    <div class="main">
        @yield('content')
    </div>
</div>
