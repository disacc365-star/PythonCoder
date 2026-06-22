<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PythonCode</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>🐍 Python Coder 🐍</h1>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
        </div>
    </header>

    <nav>
        <div class="container">
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="section">
            <h2>Write Your Python Code</h2>
            <p>Type your Python code below and click "Run" to display it.</p>
            <form onsubmit="return false;">
                <div class="form-group">
                    <textarea id="codeInput" class="code-input" placeholder="# Write your Python code here..."></textarea>
                </div>
                <button type="button" onclick="runCode()">Run</button>
                <button type="button" onclick="clearOutput()" style="margin-left: 10px;">Clear</button>
            </form>
        </div>

        <div class="section">
            <h2>Output</h2>
            <div id="output" class="output-box">Your code will appear here...</div>
        </div>

        <div id="about" class="section about-section">
            <h2>About</h2>
            <p>Welcome to Python Code Runner 🚀</p>
            <p>Fast, simple, and built for every Python enthusiast!✨🐍</p>
            <p>Write or paste your Python code and see the output instantly.⚡</p>
            <p>Perfect for learning, testing, and debugging Python programs.💻</p>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>PythonCode &copy;</p>
            <p>Mahdiar - Arvand - Benyamin</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
