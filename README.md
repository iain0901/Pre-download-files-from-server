<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Downloader - README</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2em;
        }

        h1, h2 {
            color: #333;
        }

        code {
            background-color: #f4f4f4;
            padding: 2px 4px;
            border-radius: 4px;
            font-family: 'Courier New', Courier, monospace;
        }

        pre {
            background-color: #f4f4f4;
            border-radius: 4px;
            padding: 8px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

    <h1>File Downloader</h1>

    <h2>Overview</h2>
    <p>File Downloader is a simple, user-friendly web application that enables users to download files from provided URLs. The application provides feedback on the success or failure of the download operation and allows users to view their download history.</p>

    <h2>Features</h2>
    <ul>
        <li><strong>Simple File Download</strong>: Users can download files by entering a valid URL into a form.</li>
        <li><strong>Download History</strong>: Users can view a list of files they've downloaded during their session.</li>
        <li><strong>Clear History</strong>: Users can clear their download history with a single click.</li>
    </ul>

    <h2>How It Works</h2>
    <ol>
        <li><strong>Downloading a File</strong>: When a user submits a URL through the form on the main page, a request is sent to the server, which then attempts to download the file from the provided URL. The file is stored on the server, and the path is sent back to the client.</li>
        <li><strong>Viewing Download History</strong>: If the user navigates to the download page, they can view their download history. This history is stored in cookies on the client's side.</li>
        <li><strong>Clearing History</strong>: The user has the option to clear their download history. When this action is taken, the 'downloadHistory' cookie is cleared.</li>
    </ol>

    <h2>Installation</h2>
    <ol>
        <li>Clone the repository to your local machine or server.</li>
        <li>Ensure you have PHP installed and configured on your server.</li>
        <li>Place the repository's files in the directory being served by your server.</li>
        <li>Navigate to 'index.html' through your web browser to start using the application.</li>
    </ol>

    <h2>Dependencies</h2>
    <ul>
        <li>PHP 7 or higher</li>
    </ul>

    <h2>License</h2>
    <p>[Your License]</p>

    <!-- Include additional sections if necessary. -->

</body>

</html>
