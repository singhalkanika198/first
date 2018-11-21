<html>
<head>
	<title></title>
	</head>
	<body>
		<h1> I will show the projects here</h1>
		@foreach($projects as $project) 
	     <li><a href = "/projects/{{ $project->id }}" <li> {{  $project->id  }}  </a></li>
		 <li> {{  $project->title  }}</li>
		 <li> {{ $project->description}}</li>
		 <li>finished</li>
		@endforeach 
	</body>
	</html>