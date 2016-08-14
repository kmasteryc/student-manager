<tr>
    <td>
        <div class="btn-group">
            <a class="btn btn-default" href="{!! route('grade::edit', $grade) !!}">
                @lang('form.btn_edit')
            </a>
            <form action="{!! route("grade::destroy", $grade) !!}" method="POST">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button class="btn btn-danger" type="submit">@lang('form.btn_delete')</button>
            </form>
        </div>
    </td>

    <td>{!! $grade->grade_name !!}</td>
</tr>