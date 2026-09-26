
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


        /* =========================
           NAVIGATION BAR
        ========================= */

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
            font-size: 26px;
        }

        .navbar span {
            font-size: 14px;
        }


        /* =========================
           MAIN CONTAINER
        ========================= */

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }


        /* =========================
           HEADER
        ========================= */

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .page-header h2 {
            margin: 0;
            color: #166534;
            font-size: 28px;
        }

        .page-header p {
            margin-top: 7px;
            color: #6b7280;
        }


        /* =========================
           A

