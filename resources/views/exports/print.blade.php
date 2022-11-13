<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>Middle Name</th>
        <th>First Name</th>
        <th>Course</th>
        <th>Address</th>
        <th>Purpose</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody> 
    @foreach ($print as $item)
        <tr>
            <td>{{ $item->student_id }}</td>
            <td>{{ $item->student_lastname}}</td>
            <td>{{ $item->student_middlename}}</td>
            <td>{{ $item->student_firstname}}</td>
            <td>{{ $item->student_course}}</td>
            <td>{{ $item->student_address}}</td>
            <td>{{ $item->student_purpose}}</td>
            <td>{{ $item->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>