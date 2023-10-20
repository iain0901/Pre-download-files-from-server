<?php
// api.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // 注意，在生产环境中应严格限制此项
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

function download_file($url, $storagePath) {
    if (!is_dir($storagePath)) {
        mkdir($storagePath, 0777, true);
    }
    $originalFileName = pathinfo(basename($url), PATHINFO_FILENAME);
    $extension = pathinfo(basename($url), PATHINFO_EXTENSION);
    $newFileName = $originalFileName . '_' . time() . '_' . rand(1000, 9999) . '.' . $extension;
    $newFilePath = $storagePath . $newFileName;
    $file = @fopen($url, "rb");
    if ($file) {
        $newf = @fopen($newFilePath, "wb");
        if ($newf) {
            while (!feof($file)) {
                fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
            }
        }
        fclose($newf);
        fclose($file);
        return $newFilePath;
    }
    return false;
}

$response = ['success' => false];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $url = filter_var($data->url, FILTER_SANITIZE_URL);

    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $filePath = download_file($url, 'store/');
        if ($filePath) {
            $response = ['success' => true, 'path' => $filePath];
        } else {
            $response['error'] = 'Could not download the file.';
        }
    } else {
        $response['error'] = 'Invalid URL.';
    }
}

echo json_encode($response);
?>
