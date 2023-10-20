<?php
// 清除下載紀錄
setcookie('downloadHistory', '', time() - 3600, "/");
?>
