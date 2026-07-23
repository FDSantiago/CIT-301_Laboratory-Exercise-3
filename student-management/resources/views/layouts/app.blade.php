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