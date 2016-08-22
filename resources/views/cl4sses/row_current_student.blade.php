<tr>
    <td>
        <input class="form-control" type="checkbox" name="students[]" value="{!! $student->id !!}" checked>
    </td>

    <td>{!! $student->full_name !!}</td>
    <td>{!! $student->birthday !!}</td>
    <td>
        @forelse($student->parents as $parent)
            <a href="{!! route("parent::edit", $parent) !!}" data-pjax>{!! $parent->full_name !!}</a>
        @empty
            <a href="{!! route("student::edit", $student) !!}" data-pjax><span class="text-danger">Add parents</span></a>
        @endforelse
    </td>

</tr>
