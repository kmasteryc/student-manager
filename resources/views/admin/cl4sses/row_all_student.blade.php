<tr>
    <td>
        <input class="form-control" type="checkbox" name="students[]" value="{!! $student->id !!}">
    </td>

    <td>{!! $student->full_name !!}</td>
    <td>{!! $student->birthday !!}</td>
    <td>
        @forelse($student->parents as $parent)
            <a href="{!! route("admin::parent::edit", $parent) !!}" data-pjax>{!! $parent->full_name !!}</a>
        @empty
            <a href="{!! route("admin::student::edit", $student) !!}" data-pjax><span class="text-danger">Add parents</span></a>
        @endforelse
    </td>

</tr>
