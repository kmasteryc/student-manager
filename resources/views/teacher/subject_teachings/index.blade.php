@extends('layouts.page_content')

@section('title')
    You are teaching {!! $teachable_subjects->count() !!} subjects in {!! $teaching_subjects->count() !!} classes!.
@endsection

@section('body')

    @foreach($teachable_subjects as $teachable_subject)
        <table class="table table-bordered table-hover">
            <h3>Teaching {!! $teachable_subject->subject_name !!} at</h3>
            <thead>
            <tr>
                <th>Action</th>
                <th>Class</th>
                <th>Repsonsible teacher</th>
                <th>Repsonsible parent</th>
            </tr>
            </thead>
            <tbody>
            @forelse($teaching_subjects->where('subject_id',$teachable_subject->id) as $teaching_subject)
                <tr>
                    <td>Action</td>
                    <td>{!! $teaching_subject->cl4ss->detail_name !!}</td>
                    <td>{!! $teaching_subject->teacher->full_name !!}</td>
                    <td>{!! $teaching_subject->cl4ss->parent->full_name !!}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="center">You don't teach this subject in any classes!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    @endforeach
@endsection