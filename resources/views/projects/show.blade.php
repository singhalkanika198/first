<html>
<head>
	</head>
	<body>
		{{--<h1> {{  $project->title  }}</h1>--}}
		{{--<h1> {{  $project->tasks }}</h1>--}}
		{{--<h1> {{  $project->description  }}</h1>--}}
		<a href = "/projects/{{ $project->id   }}/edit/">Edit</a>
    {{--// make a check box field to mark them completed--}}
	@if($project->tasks)
		<div>
			@foreach($project->tasks as $task)
				<div>
				<form method="POST" action="/tasks/{{$task->id}}">
					@method('PATCH')
				<label class="checkbox" for="completed">
					<input type="checkbox" name="completed" onChange="this.form.submit()">
					<l1>{{ $task->body }}</l1>
				</label>
				</form>
				</div>
			@endforeach
		</div>
	@endif

	<div>
	<form method="POST" action="/projects/{{$project->id}}/tasks">
		<input type="text" name="body">
		{{--<input type="number" name="project_id" value="{{ $project->id}}">--}}
		<button type="submit">add task</button>
	</form>
	</div>


	</form>
	</body>

	</html>
