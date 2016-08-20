<form action="{!! route("semester::destroy", $semester) !!}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <tr>
        <td class="fit">
            <div class="btn-group">
                <a class="btn btn-default" href="{!! route('semester::edit', $semester) !!}" data-pjax>
                    <i class="fa fa-pencil"></i>
                    @lang('form.btn_edit')
                </a>
                <button class="btn btn-danger btn-delete" type="submit">
                    <i class="fa fa-trash"></i>
                    @lang('form.btn_delete')
                </button>
            </div>
        </td>

        <td class="fit">{!! $semester->semester_name !!}</td>
    </tr>
</form>