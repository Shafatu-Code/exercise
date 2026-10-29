<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Form</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #eef4ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            width: 90%;
            max-width: 420px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #1e3a8a;
        }

        .description {
            text-align: center;
            color: #64748b;
            margin-bottom: 25px;
            font-size: 14px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #334155;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
        }

        input:focus {
            border-color: #2563eb;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 13px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background: #1d4ed8;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #94a3b8;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Contact Form</h2>

        <p class="description">Enter your details below.</p>

        <form action="submit.php" method="POST">

            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter your full name"
                required
            >

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
                required
            >

            <label for="contact">Contact</label>
            <input
                type="text"
                id="contact"
                name="contact"
                placeholder="Enter your phone number"
                required
            >

            <input type="submit" value="Submit">

        </form>

        <div class="footer">
            Contact Form
        </div>

    </div>

</body>

</html>