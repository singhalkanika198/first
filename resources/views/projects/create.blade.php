<html>
<head>
	<title>
	</title>
</head>
<body>
<form method="POST" action ="/projects">
	{{ csrf_field() }}
	<input type="text" name="title">
	<input type="description" name="description">
	<button type="submit">Submit</button>
</form>


	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</body>
</html>
