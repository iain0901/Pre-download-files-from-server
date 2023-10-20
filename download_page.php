<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Page</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #ececec;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .home-button, .clear-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .home-button {
            position: fixed;
            top: 10px;
            left: 10px;
        }
        .home-button:hover, .clear-button:hover {
            background-color: #45a049;
        }
        .download-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 80%;
            max-width: 500px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
            font-size: 24px;
        }
        .clear-button {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #d9534f;
        }
        .clear-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <a href="index.html" class="home-button">Home</a>
    <div class="download-container">
        <h2>Download Page</h2>
        <?php
        session_start();
        $downloadHistory = isset($_COOKIE['downloadHistory']) ? json_decode($_COOKIE['downloadHistory'], true) : [];
        if(isset($_SESSION['downloadedFilePath'])) {
            $downloadedFilePath = $_SESSION['downloadedFilePath'];
            $fileName = basename($downloadedFilePath);
            echo "<a href=\"{$downloadedFilePath}\">Click here to download: {$fileName}</a>";
            $downloadHistory[] = [
                'date' => date("Y-m-d H:i:s"),
                'name' => $fileName,
                'path' => $downloadedFilePath
            ];
            setcookie('downloadHistory', json_encode($downloadHistory), time() + (86400 * 30), "/");
        }
        ?>
        <table>
            <tr>
                <th>Download Date and Time</th>
                <th>File Name</th>
                <th>Download Link</th>
            </tr>
            <?php
            foreach($downloadHistory as $history) {
                echo "<tr>
                        <td>{$history['date']}</td>
                        <td>{$history['name']}</td>
                        <td><a href=\"{$history['path']}\" download>Download</a></td>
                      </tr>";
            }
            ?>
        </table>
        <button class="clear-button" onclick="clearDownloadHistory()">Clear Download History</button>
    </div>

    <script>
        function clearDownloadHistory() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "clear_history.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if(this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    location.reload();
                }
            }
            xhr.send();
        }
    </script>
</body>
</html>
