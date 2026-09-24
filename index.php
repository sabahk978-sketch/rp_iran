<?php
// ============================
//  تنظیمات
// ============================
$ip      = "lac-prime.ir:8080";   // آی‌پی سرور مقصد
$port    = 8080;          // پورت سرور مقصد
$name    = "rp_iran";
$timeout = 3;           // ثانیه

// ============================
//  چک اتصال
// ============================
$conn = @fsockopen($ip, $port, $errno, $errstr, $timeout);
$online = is_resource($conn);
if ($online) fclose($conn);
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>وضعیت سرور</title>
    <meta http-equiv="refresh" content="15">
    <style>
        body {
            font-family: Tahoma, sans-serif;
            background: #1e1e2e;
            color: #eee;
            text-align: center;
            padding: 60px 20px;
            direction: rtl;
        }
        .card {
            background: #2a2a3e;
            border-radius: 12px;
            padding: 30px;
            max-width: 380px;
            margin: 0 auto;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
        }
        h2 { margin: 0 0 25px; font-weight: normal; }
        .status {
            font-size: 22px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
        }
        .online  { color: #2ecc71; }
        .offline { color: #e74c3c; }
        .dot.online  { background: #2ecc71; box-shadow: 0 0 12px #2ecc71; }
        .dot.offline { background: #e74c3c; box-shadow: 0 0 12px #e74c3c; }
        .info {
            margin-top: 20px;
            font-size: 13px;
            color: #999;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2><?php echo htmlspecialchars($name); ?></h2>
        <div class="status <?php echo $online ? 'online' : 'offline'; ?>">
            <span class="dot <?php echo $online ? 'online' : 'offline'; ?>"></span>
            <?php echo $online ? 'روشن' : 'خاموش'; ?>
        </div>
        <div class="info">
            <?php echo $ip; ?>:<?php echo $port; ?><br>
            آخرین بررسی: <?php echo date("H:i:s"); ?>
        </div>
    </div>
</body>
</html>