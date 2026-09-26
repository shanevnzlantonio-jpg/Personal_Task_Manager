```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task - Personal Task Manager</title>

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
        }

        .navbar h1 {
            margin: 0;
            font-size: 26px;
        }

        .navbar p {
            margin: 5px 0 0;
            opacity: 0.9;
        }

        /* CONTAINER */
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* CARD */
        .card {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 8px;
            color: #166534;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 25px;
        }

        /* FORM */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #1f2937;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #dbeafe;
            border-radius: 8px;
            font-size: 15px;
            font-family: Arial, sans-serif;
            transition: 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        /* ERRORS */
        .errors {
            background: #fee2e2;
            border-left: 5px solid #dc2626;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        /* BUTTONS */
        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }

        .btn-save {
            background: #16a34a;
            color: white;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .btn-back {
            background: #2563eb;
            color: white;
        }

        .btn-back:hover {
            background: #1d4ed8;
        }

        /* REQUIRED MARK */
        .required {
            color: #dc2626;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            color: #6b7280;
            margin-top: 25px;
            font-size: 13px;
        }

        /* MOBILE */
        @media (max-width: 600px) {
            .navbar {
                padding: 18px 20px;
            }

            .container {
                margin: 25px auto;
            }

            .card {
                padding: 25px 20px;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h1>Personal Task Manager</h1>
        <p>Stay organized. Stay productive.</p>
    </div>


    <!-- MAIN CONTENT -->
    <div class="container">

        <div class="card">

            <h2>Add New Task</h2>

            <p class="subtitle">
                Create a new task and keep track of your progress.
            </p>


            <!-- VALIDATION ERRORS -->
            @if ($errors->any())

                <div class="errors">

                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach
                    </ul>

                </div>

            @endif


            <!-- ADD TASK FORM -->
            <form action="/tasks" method="POST">

                @csrf


                <!-- TASK NAME -->
                <div class="form-group">

                    <label for="task_name">
                        Task Name <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name') }}"
                        placeholder="Example: Finish Laravel Project"
                        required
                    >

                </div>


                <!-- DESCRIPTION -->
                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        placeholder="Enter details about your task..."
                    >{{ old('description') }}</textarea>

                </div>


                <!-- STATUS -->
                <div class="form-group">

                    <label for="status">
                        Status <span class="required">*</span>
                    </label>

                    <select
                        id="status"
                        name="status"
                        required
                    >

                        <option value="Pending"
                            {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Completed"
                            {{ old('status') == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                    </select>

                </div>


                <!-- DUE DATE -->
                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date') }}"
                    >

                </div>


                <!-- BUTTONS -->
                <div class="buttons">

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        ✓ Save Task
                    </button>


                    <a
                        href="/tasks"
                        class="btn btn-back"
                    >
                        ← Back to Tasks
                    </a>

                </div>

            </form>

        </div>


        <div class="footer">
            Personal Task Manager • Green & Blue Edition
        </div>

    </div>

</body>
</html>

