<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="form-container">

    <div class="form-box">

        <h1>Edit Task</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task) }}" method="POST">

            @csrf
            @method('PUT')

            <label>Task Name</label>

            <input type="text"
                   name="task_name"
                   value="{{ old('task_name', $task->task_name) }}"
                   required>

            <label>Description</label>

            <textarea name="description">{{ old('description', $task->description) }}</textarea>

            <label>Status</label>

            <select name="status">

                <option value="Pending"
                    {{ $task->status == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ $task->status == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

            <label>Due Date</label>

            <input type="date"
                   name="due_date"
                   value="{{ old('due_date', $task->due_date) }}">

            <div class="form-buttons">

                <button type="submit" class="save-btn">
                    Update Task
                </button>

                <a href="{{ route('tasks.index') }}"
                   class="cancel-btn">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>