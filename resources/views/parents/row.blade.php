<form action="{!! route("parent::destroy", $parent) !!}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <tr>
        <td>
            <div class="btn-group">
                <a class="btn btn-default"
                   href="{!! route('parent::edit', $parent) !!}"
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
        <td>{!! $parent->full_name !!}</td>
        <td>{!! str_limit($parent->info,50) !!}</td>
        <td>
            @foreach($parent->students as $student)
                <a href="{!! route('student::edit', $student) !!}">{!! $student->full_name !!}</a>
            @endforeach
        </td>
    </tr>
</form>