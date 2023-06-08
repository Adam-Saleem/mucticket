<div class="sidebar-wrapper">
    <ul class="nav">
            <li>
                <a class="text-center" href="{{ url('/') }}">Home</a>
            </li>
        @can('viewAny', \App\Models\School::class)
            <li>
                <a class="text-center" href="{{ url('school') }}">Schools</a>
            </li>
        @endcan
            <li>
                <a class="text-center" href="{{ url('teacher') }}">Teachers</a>
            </li>
            <li>
                <a class="text-center" href="{{ url('student') }}">Students</a>
            </li>
            <li>
                <a class="text-center" href="{{ url('subject') }}">Subjects</a>
            </li>
        </ul>
</div>
