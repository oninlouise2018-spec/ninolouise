<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="form-container">

    <div class="form-box">

        <h1>Add New Task</h1>

        @if($errors->any())
            <div class="error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <label>Task Name</label>
            <input type="text"
                   name="task_name"
                   placeholder="Enter task name"
                   value="{{ old('task_name') }}"
                   required>

            <label>Description</label>
            <textarea name="description"
                      placeholder="Enter task description">{{ old('description') }}</textarea>

            <label>Status</label>
            <select name="status">

                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>

            </select>

            <label>Due Date</label>
            <input type="date"
                   name="due_date"
                   value="{{ old('due_date') }}">

            <div class="form-buttons">

                <button type="submit" class="save-btn">
                    Save Task
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