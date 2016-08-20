<tr>
    <form action="{!! route("scholastic::destroy", $scholastic) !!}" method="POST">
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <td class="fit">
            <div class="btn-group">
                <a class="btn btn-default" href="{!! route('scholastic::edit', $scholastic) !!}" data-pjax>
                    <i class="fa fa-pencil"></i>
                    @lang('form.btn_edit')
                </a>

                <button class="btn btn-danger btn-delete" type="submit">
                    <i class="fa fa-trash"></i>
                    @lang('form.btn_delete')
                </button>

            </div>
        </td>

        <td class="fit">{!! $scholastic->scholastic_from !!}</td>
        <td class="fit">{!! $scholastic->scholastic_to !!}</td>
    </form>
</tr>