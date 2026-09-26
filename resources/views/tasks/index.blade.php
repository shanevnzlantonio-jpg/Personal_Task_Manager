<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f0fdf4;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #16a34a, #2563eb);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
        }

        /* MAIN CONTAINER */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top h2 {
            margin-bottom: 5px;
            color: #166534;
        }

        /* BUTTONS */
        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
            display: inline-block;
        }

        .btn-add {
            background: #16a34a;
            color: white;
        }

        .btn-add:hover {
            background: #15803d;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
        }

        /* SUCCESS MESSAGE */
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* TABLE */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f0fdf4;
        }

        /* STATUS */
        .pending {
            background: #fef3c7;
            color: #92400e;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
        }

        .completed {
            background: #dcfce7;
            color: #166534;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 13px;
        }

        /* ACTIONS */
        .actions {
            display: flex;
            gap: 5px;
        }

        .actions form {
            margin: 0;
        }

        /* EMPTY STATE */
        .empty {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->
    <div class="navbar">

        <h1>Task Manager</h1>

        <span>Personal Productivity</span>

    </div>


    <!-- MAIN CONTENT -->
    <div class="container">

        <div class="top">

            <div>
                <h2>My Tasks</h2>

                <p>
                    Manage your daily tasks easily.
                </p>
            </div>

            <a
                href="/tasks/create"
                class="btn btn-add">

                + Add Task

            </a>

        </div>


        <!-- SUCCESS MESSAGE -->
        @if(session('success'))

            <div class="success">

                {{ session('success') }}

            </div>

        @endif


        <!-- TASK TABLE -->
        <div class="table-card">

            <table>

                <thead>

                    <tr>

                        <th>Task</th>

                        <th>Description</th>

                        <th>Status</th>

                        <th>Due Date</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($tasks as $task)

                        <tr>

                            <td>
                                <strong>
                                    {{ $task->task_name }}
                                </strong>
                            </td>


                            <td>
                                {{ $task->description ?? 'No description' }}
                            </td>


                            <td>

                                @if($task->status === 'Completed')

                                    <span class="completed">
                                        Completed
                                    </span>

                                @else

                                    <span class="pending">
                                        Pending
                                    </span>

                                @endif

                            </td>


                            <td>

                                {{ $task->due_date ?? 'No deadline' }}

                            </td>


                            <td>

                                <div class="actions">

                                    <!-- EDIT -->
                                    <a
                                        href="/tasks/{{ $task->id }}/edit"
                                        class="btn btn-edit">

                                        Edit

                                    </a>


                                    <!-- DELETE -->
                                    <form
                                        action="/tasks/{{ $task->id }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this task?');">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="empty">

                                No tasks yet.
                                Click <strong>+ Add Task</strong>
                                to create your first task.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</body>
</html>