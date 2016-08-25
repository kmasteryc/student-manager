@extends('layouts.page_content')

@section('title')
    Marks result
@endsection

@section('body')
    <h3>{!! $student->full_name !!}. {!! $cl4ss->detail_name !!}</h3>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject name</th>
            @foreach($mark_types as $mark_type)
                <th>{!! $mark_type->mark_type_name !!} ({!! $mark_type->mark_type_multiple !!})</th>
            @endforeach
            <th>Average</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cl4ss_subjects as $cl4ss_subject)

            <tr>
                <td>#</td>
                <td>{!! $cl4ss_subject->subject->subject_name !!}</td>
                @foreach($mark_types as $mark_type)
                    <td>
                        <?php
                        $mark = $marks->where('mark_type_id', $mark_type->id)
                                ->where('cl4ss_subject_id', $cl4ss_subject->id)
                                ->first();
                        echo $mark === null ? '' : $mark->mark_point;
                        ?>
                    </td>
                @endforeach
                <td></td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection