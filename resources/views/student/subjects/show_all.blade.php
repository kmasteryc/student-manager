@extends('layouts.page_content')

@section('title')
    All marks result
@endsection

@section('body')
    @foreach($cl4sses as $cl4ss)
        <h3>{!! $cl4ss->detail_name !!}. Responsible teacher: {!! $cl4ss->teacher->full_name !!}</h3>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Subject name</th>
                <th>Teacher</th>
                @foreach($mark_types as $mark_type)
                    <th>{!! $mark_type->mark_type_name !!} ({!! $mark_type->mark_type_multiple !!})</th>
                @endforeach
                <th>Average</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($cl4ss->cl4ssSubjects as $cl4ssSubject)

                <tr>
                    <td>#</td>
                    <td>{!! $cl4ssSubject->subject->subject_name !!}</td>
                    <td>{!! $cl4ssSubject->teacher->full_name !!} - {!! $cl4ssSubject->teacher->id !!}</td>
                    @foreach($mark_types as $mark_type)
                        <?php
                        $mark = $cl4ssSubject->marks->where('mark_type_id', $mark_type->id)->first();
                        var_dump($mark);
                        $mark = !$mark ? '-' : $mark->mark_point;
                        $average = Tool::average($cl4ssSubject->marks);
                        ?>
                        <td>{!! $mark !!}</td>
                    @endforeach
                    <td>{!! $average !!}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    @endforeach
@endsection