<?php
$pageTitle= "Home";
include "view-header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            color: #555;
        }
        .dark-mode {
            background-color: #333;
            color: #fff;
        }
        button, input, textarea {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
        }
        #wordCount, #fetchResult {
            margin: 10px;
            font-size: 18px;
            color: #0078D7;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Interactive Home Page</h1>
    <button id="themeButton" onclick="toggleTheme()">Dark Mode</button>

    <form onsubmit="return confirmSubmission() && validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name"><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email"><br>
        
        <label for="textInput">Text Input:</label><br>
        <textarea id="textInput" oninput="countWords()" rows="4" cols="50" placeholder="Start typing..."></textarea>
        <div id="wordCount">Word Count: 0</div>
        
        <button type="button" onclick="fetchData()">Fetch Data</button>
        <div id="fetchResult"></div>

        <button type="submit">Submit</button>
    </form>

    <script>
        // Function 1: Form Validation
        function validateForm() {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            if (name.trim() === '' || email.trim() === '') {
                alert('All fields must be filled out!');
                return false;
            }
            return true;
        }

        // Function 2: Live Word Count
        function countWords() {
            const text = document.getElementById('textInput').value;
            const wordCount = text.trim().split(/\s+/).filter(Boolean).length;
            document.getElementById('wordCount').innerText = 'Word Count: ' + wordCount;
        }

        // Function 3: Dynamic Theme Switcher
        function toggleTheme() {
            const body = document.body;
            body.classList.toggle('dark-mode');
            const themeButton = document.getElementById('themeButton');
            themeButton.innerText = body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
        }

        // Function 4: Simulate Fetching Data
        function fetchData() {
            document.getElementById('fetchResult').innerText = 'Fetching data...';
            setTimeout(() => {
                document.getElementById('fetchResult').innerText = 'Data fetched successfully!';
            }, 2000);
        }

        // Function 5: Confirmation on Submit
        function confirmSubmission() {
            return confirm('Are you sure you want to submit this form?');
        }
    </script>
</body>
</html>
<?php
include "view-footer.php";
?>

