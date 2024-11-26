<!DOCTYPE html>
<html>
<head>
    <title>Customers Page</title>
</head>
<body>
    <h1>Daftar Customers</h1>
    @foreach ($customers as $row)
    <div>
        <div style="width: 10%;floating:left">
            <img src="storage/{{ $row->picture }}">
        </div>
        <div style="width: 90%;">
            <span>{{ $row->title}}</span>
            <p style="display: inline-block;">{{ $row->content }}</p>
        </div>
    </div>
    @endforeach

</body>
</html>
