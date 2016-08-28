<tr>
    <form action="{!! route("admin::mark_type::destroy", $mark_type) !!}" method="POST" data-pjax>
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <td>
            <div class="btn-group">
                <a class="btn btn-default" href="{!! route('admin::mark_type::edit', $mark_type) !!}" data-pjax>
                    <i class="fa fa-pencil"></i>
                    @lang('form.btn_edit')
                </a>

                <button class="btn btn-danger btn-delete" type="submit">
                    @lang('form.btn_delete')
                </button>

            </div>
        </td>

        <td>{!! $mark_type->mark_type_name !!}</td>
        <td>{!! $mark_type->mark_type_multiple !!}</td>
    </form>
</tr>