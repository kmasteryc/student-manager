<form action="{!! route("student::destroy", $student) !!}" method="POST" data-pjax>
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <tr>
        <td>
            <div class="btn-group">
                <a class="btn btn-default"
                   href="{!! route('student::edit', $student) !!}"
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
        <td>{!! $student->last_name !!}</td>
        <td>{!! $student->first_name !!}</td>
        <td>
            @foreach($student->parents as $parent)
                <a href="{!! route('parent::edit', $parent) !!}" data-pjax>{!! $parent->full_name !!}</a>
            @endforeach
        </td>
        <td>
            @foreach($student->cl4sses as $cl4ss)
                <a href="{!! route('cl4ss::edit', $cl4ss) !!}" data-pjax>{!! $cl4ss->detail_name !!}</a>
            @endforeach
        </td>
    </tr>
</form>