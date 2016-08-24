@extends('layouts.page_content')

@section('title')
    You have teached {!! $teachable_subjects->count() !!} subjects in {!! $teached_subjects->count() !!} classes!
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
            @forelse($teached_subjects->where('subject_id',$teachable_subject->id) as $teached_subject)
                <tr>
                    <td>Action</td>
                    <td>{!! $teached_subject->cl4ss->detail_name !!}</td>
                    <td>{!! $teached_subject->teacher->full_name !!}</td>
                    <td>{!! $teached_subject->cl4ss->parent->full_name !!}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="center">You've never taught this subject in any classes!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    @endforeach
@endsection