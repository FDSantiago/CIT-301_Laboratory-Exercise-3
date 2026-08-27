<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        nav {
            background-color: #1f4e78;
            color: white;
            padding: 18px 30px;
        }

        nav h2 {
            margin: 0;
        }

        .container {
            width: 85%;
            margin: 30px auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background-color: #1f4e78;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #163a5c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #1f4e78;
            color: white;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .error {
            color: #b30000;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 12px;
        }

        .btn-danger {
            display: inline-block;
            padding: 10px 16px;
            background-color: #b30000;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #800000;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .page-header h1 {
            margin-bottom: 5px;
        }

        .page-header p {
            margin: 0;
            color: #666;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group small {
            display: block;
            color: #666666;
            margin-top: 6px;
        }

        .search-filter-form {
            display: grid;
            grid-template-columns: 2fr 1fr auto;
            gap: 15px;
            align-items: end;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f4f7fa;
            border: 1px solid #dbe3ea;
            border-radius: 8px;
        }

        .search-field label,
        .filter-field label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .search-field input,
        .filter-field select {
            width: 100%;
            padding: 11px;
            border: 1px solid #bbbbbb;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .filter-buttons {
            display: flex;
            gap: 8px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background-color: #16598a;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #10456d;
        }

        .btn-secondary {
            display: inline-block;
            padding: 10px 16px;
            background-color: #666666;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background-color: #444444;
        }

        .btn-small {
            display: inline-block;
            padding: 8px 12px;
            background-color: #16598a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-danger {
            display: inline-block;
            padding: 8px 12px;
            background-color: #b30000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #800000;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .delete-form {
            display: inline;
            margin: 0;
        }

        .student-picture {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #dddddd;
        }

        .student-picture-large {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid #dddddd;
        }

        .default-picture {
            width: 55px;
            height: 55px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #dce9f5;
            color: #16598a;
            border-radius: 50%;
            font-size: 22px;
            font-weight: bold;
        }

        .default-picture-large {
            width: 130px;
            height: 130px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #dce9f5;
            color: #16598a;
            border-radius: 10px;
            font-size: 48px;
            font-weight: bold;
        }

        .current-picture {
            margin-top: 10px;
        }

        .course-badge {
            display: inline-block;
            padding: 5px 10px;
            background-color: #e4eef7;
            color: #16598a;
            border-radius: 12px;
            font-weight: bold;
        }

        .search-summary {
            padding: 13px;
            margin-bottom: 18px;
            background-color: #fff7d6;
            border-left: 5px solid #e4b900;
            border-radius: 4px;
        }

        .search-summary span {
            display: inline-block;
            padding: 3px 8px;
            margin-right: 8px;
            background-color: white;
            border-radius: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        .empty-message {
            padding: 30px;
            text-align: center;
            color: #666666;
        }

        .success {
            padding: 12px;
            margin-bottom: 15px;
            background-color: #d8f3dc;
            color: #1b4332;
            border-radius: 5px;
        }

        .error {
            margin-top: 5px;
            color: #b30000;
            font-size: 14px;
        }

        @media (max-width: 800px) {
            .search-filter-form {
                grid-template-columns: 1fr;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .filter-buttons {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <nav>
        <h2>Student Management System</h2>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
