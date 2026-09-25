<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Personal Task Manager</h1>
            <p>Manage your tasks easily</p>
        </div>

        <a href="{{ route('tasks.create') }}" class="add-btn">
            + Add Task
        </a>
    </div>

    <h2>My Tasks</h2>

    @if(session('success'))
        <p class="success">
            {{ session('success') }}
        </p>
    @endif

    @if($tasks->count() > 0)

        @foreach($tasks as $task)

            <div class="task-card">

                <h3>{{ $task->task_name }}</h3>

                <p>
                    <strong>Description:</strong>
                    {{ $task->description }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ $task->status }}
                </p>

                <p>
                    <strong>Due Date:</strong>
                    {{ $task->due_date }}
                </p>

                <a href="{{ route('tasks.edit', $task->id) }}" class="edit-btn">
                    Edit
                </a>

                <form action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="delete-btn">
                        Delete
                    </button>

                </form>

                <form action="{{ route('tasks.status', $task->id) }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('PATCH')

                    <button type="submit" class="status-btn">
                        Change Status
                    </button>

                </form>

            </div>

        @endforeach

    @else

        <div class="empty">
            <h3>No tasks yet</h3>
            <p>Click "Add Task" to create your first task.</p>
        </div>

    @endif

</div>

</body>
</html>