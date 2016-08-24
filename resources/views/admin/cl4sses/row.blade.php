<tr>
    <form action="{!! route("admin::cl4ss::destroy", $cl4ss) !!}" method="POST" data-pjax>
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <td>
            <div class="btn-group">
                <a class="btn btn-primary" href="{!! route('admin::cl4ss::add-student', $cl4ss) !!}" data-pjax>
                    <i class="fa fa-plus"></i>
                    @lang('form.add_student')
                </a>

                <a class="btn btn-default" href="{!! route('admin::cl4ss::edit', $cl4ss) !!}" data-pjax>
                    <i class="fa fa-pencil"></i>
                    @lang('form.btn_edit')
                </a>

                <button class="btn btn-danger btn-delete" type="submit">
                    <i class="fa fa-trash"></i>
                    @lang('form.btn_delete')
                </button>

            </div>
        </td>
        <td>{!! $cl4ss->grade->grade_name !!}</td>
        <td>{!! $cl4ss->cl4ssType->cl4ss_type_name !!}</td>
        <td>{!! $cl4ss->semester->semester_name !!}</td>
        <td>{!! $cl4ss->teacher->full_name !!}</td>
        <td>{!! $cl4ss->scholastic->scholastic_duration !!}</td>

    </form>
</tr>