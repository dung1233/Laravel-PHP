<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            background: white;
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        textarea,
        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            box-sizing: border-box; /* so padding doesn't affect width */
        }

        button {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    
    
    <form>
        
        @csrf
        <div>
            <label for="name">Event Name</label>
            <input type="text" id="name" name="name" placeholder="Event Name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Event Description" required></textarea>
        </div>

        <div>
            <label for="start_time">Start Time</label>
            <input type="datetime-local" id="start_time" name="start_time" required>
        </div>

        <div>
            <label for="end_time">End Time</label>
            <input type="datetime-local" id="end_time" name="end_time" required>
        </div>

        <button type="submit">Create Event</button>
    </form>
</body>
</html>
