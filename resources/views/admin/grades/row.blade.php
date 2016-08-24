<form action="{!! route("admin::grade::destroy", $grade) !!}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <tr>
        <td>
            <div class="btn-group">
                <a class="btn btn-default" href="{!! route('admin::grade::edit', $grade) !!}" data-pjax>
                    <i class="fa fa-pencil"></i>
                    @lang('form.btn_edit')
                </a>
                <button class="btn btn-danger btn-delete" type="submit">
                    <i class="fa fa-trash"></i>
                    @lang('form.btn_delete')
                </button>
            </div>
        </td>
        <td>{!! $grade->grade_name !!}</td>
    </tr>
</form>