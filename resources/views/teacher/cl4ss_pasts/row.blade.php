<table class="table table-bordered table-hover datatable">
    <h3>{!! $cl4ss->detail_name !!}. Total: {!! $cl4ss->students->count() !!} students</h3>
    <thead>
    <tr>
        <th>Action</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Parent</th>
    </tr>
    </thead>
    <tbody>
    @each('teacher.cl4ss_pasts.row_student', $cl4ss->students, 'student')
    </tbody>
</table>