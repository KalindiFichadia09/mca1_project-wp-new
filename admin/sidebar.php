<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar with Header</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <style>
        /* Custom CSS for sidebar */
        .sidebar {
            height: calc(100vh - 60px); 
            position: fixed;
            top: 60px; 
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        /* Header styles */
        .header {
            width: 100%;
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px; 
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .sign-in {
            margin-left: auto;
        }

        .toggle-btn {
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            display: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
            }

            .toggle-btn {
                display: block;
            }

            .sign-in {
                margin-right: 20px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <button class="toggle-btn">☰</button>
    <h1>My Website</h1>
    <a href="#signin" class="sign-in">Sign In</a>
</div>

<div class="sidebar">
    <a href="#home">Home</a>
    <a href="#services">Services</a>
    <a href="#clients">Clients</a>
    <a href="#contact">Contact</a>
</div>

<div class="content" style="margin-top: 60px;">
    <h2>Responsive Sidebar with Header Example</h2>
    <p>This sidebar is full-height and always shown. However, on smaller screens (max-width: 768px), the sidebar will convert into a toggle button or slider. The header is also responsive with a Sign In link on the right side.</p>
</div>

</body>
</html>