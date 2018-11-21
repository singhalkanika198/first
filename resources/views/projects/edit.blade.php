<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="/projects/ {{ $project->id }}">
	{{ method_field('PATCH')}}
	<input type="text" value = "{{ $project->title}}" name="title">
	<input type="text" value = "{{ $project->description}}" name="description">
	<button type="submit">UPDATE PROJECT</button>
</form>


<form method="POST" action="/projects/ {{ $project->id }}">
	{{ method_field('DELETE')}}
	<input type="text" value = "{{ $project->title}}" name="title">
	<input type="text" value = "{{ $project->description}}" name="description">
	<button type="submit">DELETE PROJECT</button>
</form>

</body>
</html>