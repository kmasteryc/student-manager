<form action="{!! route("admin::student::destroy", $student) !!}" method="POST" data-pjax>
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <tr>
        <td>
            <div class="btn-group">
                <a class="btn btn-default"
                   href="{!! route('admin::student::edit', $student) !!}"
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
        <td>IMAGE</td>
        <td>{!! $student->last_name !!}</td>
        <td>{!! $student->first_name !!}</td>
        <td>
            @foreach($student->parents as $parent)
                <a href="{!! route('admin::parent::edit', $parent) !!}" data-pjax>{!! $parent->full_name !!}</a>
            @endforeach
        </td>
        <td>{!! $student->birthday !!}</td>
    </tr>
</form>