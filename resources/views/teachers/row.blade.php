<form action="{!! route("teacher::destroy", $teacher) !!}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <tr>
        <td>
            <div class="btn-group">
                <a class="btn btn-default"
                   href="{!! route('teacher::edit', $teacher) !!}"
                   data-pjax>
                    <i class="fa fa-pencil"></i>
                    @lang('form.btn_edit')
                </a>
                <button class="btn btn-danger btn-delete" type="submit">
                    <i class="fa fa-trash"></i>
                    @lang('form.btn_delete')
                </button>
            </div>
        </td>
        <td>{!! $teacher->full_name !!}</td>
        <td>{!! $teacher->birthday !!}</td>
        <td>{!! $teacher->subjects->pluck('subject_name')->implode(', ') !!}</td>
    </tr>
</form>