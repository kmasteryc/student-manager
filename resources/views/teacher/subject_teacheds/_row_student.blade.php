<tr>
    <td>Action</td>
    <td>{!! $student->first_name !!}</td>
    <td>{!! $student->last_name !!}</td>
    <td>{!! $student->parents->pluck('full_name')->implode(', ') !!}</td>
</tr>