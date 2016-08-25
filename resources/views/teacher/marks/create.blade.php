@extends('layouts.page_content')

@section('title')
    {!! $cl4ss_subject->subject->subject_name !!}'s marks of students in {!! $cl4ss_subject->cl4ss->detail_name !!}
@endsection

@section('body')

    <form action="{!! route("teacher::mark::store", $cl4ss_subject) !!}" method="POST" data-pjax>
        {!! csrf_field() !!}
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                @foreach($mark_types as $mark_type)
                    <th>{!! $mark_type->mark_type_name !!} ({!! $mark_type->mark_type_multiple !!})</th>
                @endforeach
                <th>Average</th>
            </tr>
            </thead>
            <tbody>

            <?php $i = 1; ?>
            @foreach($cl4ss_subject->cl4ss->students as $student)
                <tr>
                    <td>{!! $i++ !!}</td>
                    <td>#{!! $student->id !!}</td>
                    <td>{!! $student->first_name !!}</td>
                    <td>{!! $student->last_name !!}</td>
                    @foreach($mark_types as $mark_type)
                        <td>

                            <?php
                            $mark = \App\Models\MarkLayer\Mark::where([
                                    'cl4ss_subject_id' => $cl4ss_subject->id,
                                    'student_id'       => $student->id,
                                    'mark_type_id'     => $mark_type->id
                            ])->select('mark_point')->first();

                            $disabled = $mark !== null ? 'disabled' : '';
                            $mark_point = $mark !== null ? $mark->mark_point : '';
                            ?>

                            <select {!! $disabled !!} name="students[{!! $student->id !!}][{!! $mark_type->id !!}]"
                                    class="form-control">
                                <option value="-1">-</option>
                                @for($j = 0; $j<=10; $j+=0.5)
                                    <option value="{!! $j !!}" {!! $mark_point === $j ? 'selected':'' !!}>{!! $j !!}</option>
                                @endfor
                            </select>
                        </td>
                    @endforeach
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="center">
            <div class="btn-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus icon-loading-btn"></i> Add</button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
            </div>
        </div>
    </form>
@endsection