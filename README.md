# File Downloader Web Application

This project is a simple web application that allows users to download files from provided URLs and tracks the download history.

## Features

- **Download Files**: Users can download files by entering the file's URL.
- **Download History**: Users can view their past downloads, each entry containing the file name, download link, and the date and time of the download.
- **Clear History**: Provides the ability to clear the download history.

## Files

- `index.html`: The main interface that contains the form for downloading files.
- `api.php`: Handles the server-side logic for initiating downloads (actual content not provided).
- `clear_history.php`: Responsible for clearing the user's download history (actual content not provided).
- `download_page.php`: Displays the user's download history and provides an option to clear it.
- `.user.ini`: Configuration file that sets the 'open_basedir' directive for the application.

## Setup

You need a standard web server setup (e.g., LAMP stack) to run this application. Place all the files in your web root directory, and make sure PHP is configured correctly to read the `.user.ini` file.

## Usage

1. Open `index.html` in your web browser.
2. Enter the URL of the file you wish to download and submit the form.
3. You'll be able to see your download history on the `download_page.php` page, accessible from the main page after your first successful download.
4. To clear your download history, use the "Clear Download History" button on the download page.

## Security

The `.user.ini` file restricts the directories that the application can access. Adjust the paths as necessary for your environment, and ensure your PHP setup is secure.

**Note: This application does not handle authentication or authorization. Ensure proper security measures are in place before deploying in a production environment.**

## Contributions

Feel free to fork the project and submit your contributions via pull requests.

## License

[MIT](https://opensource.org/licenses/MIT)
