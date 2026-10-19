<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

if ($method === 'OPTIONS') {
    exit(0);
}

// Database configuration (XAMPP default)
$dbHost = '127.0.0.1';
$dbUser = 'root';
$dbPass = '';
$dbName = 'agency_db';
$dataFile = __DIR__ . '/data.json';

// Try MySQL connection
$mysqli = @new mysqli($dbHost, $dbUser, $dbPass, $dbName);
$useMySQL = (!$mysqli->connect_error);

if ($useMySQL) {
    $mysqli->set_charset('utf8mb4');
}

// Helper to fetch full data from MySQL
function getMySQLData($mysqli) {
    $data = ['plans' => [], 'coupons' => [], 'orders' => []];

    // Fetch plans
    $resPlans = $mysqli->query("SELECT * FROM plans ORDER BY id ASC");
    if ($resPlans) {
        while ($row = $resPlans->fetch_assoc()) {
            $features = json_decode($row['features'], true);
            if (!is_array($features)) {
                $features = explode("\n", $row['features']);
            }
            $data['plans'][] = [
                'id' => $row['plan_id'] ?: ('plan_' . $row['id']),
                'name' => $row['name'],
                'price' => (int)$row['price'],
                'billing' => $row['billing'],
                'badge' => $row['badge'],
                'isFeatured' => (bool)$row['is_featured'],
                'description' => $row['description'],
                'features' => array_map('trim', $features)
            ];
        }
    }

    // Fetch coupons
    $resCoupons = $mysqli->query("SELECT * FROM coupons ORDER BY id ASC");
    if ($resCoupons) {
        while ($row = $resCoupons->fetch_assoc()) {
            $data['coupons'][] = [
                'code' => $row['code'],
                'type' => $row['type'],
                'value' => (int)$row['value'],
                'label' => $row['label'],
                'active' => (bool)$row['active']
            ];
        }
    }

    // Fetch orders
    $resOrders = $mysqli->query("SELECT * FROM orders ORDER BY id DESC");
    if ($resOrders) {
        while ($row = $resOrders->fetch_assoc()) {
            $data['orders'][] = [
                'orderId' => $row['order_id'],
                'trackingPassword' => $row['tracking_password'],
                'clientName' => $row['client_name'],
                'phone' => $row['phone'],
                'business' => $row['business'],
                'email' => $row['email'],
                'planName' => $row['plan_name'],
                'amountPaid' => (float)$row['amount_paid'],
                'date' => $row['order_date'],
                'stage' => (int)$row['stage'],
                'statusNote' => $row['status_note']
            ];
        }
    }

    return $data;
}

if ($method === 'GET') {
    if ($useMySQL) {
        $mysqlData = getMySQLData($mysqli);
        if (!empty($mysqlData['plans'])) {
            // Also sync to data.json
            @file_put_contents($dataFile, json_encode($mysqlData, JSON_PRETTY_PRINT));
            echo json_encode($mysqlData);
            exit;
        }
    }

    // Fallback to data.json if MySQL empty or offline
    if (file_exists($dataFile)) {
        echo file_get_contents($dataFile);
    } else {
        echo json_encode(['plans' => [], 'coupons' => [], 'orders' => []]);
    }
    exit;
}

if ($method === 'POST') {
    $rawInput = file_get_contents('php://input');
    $decoded = json_decode($rawInput, true);

    if (!$decoded) {
        echo json_encode(['error' => 'Invalid JSON input']);
        exit;
    }

    $action = isset($decoded['action']) ? $decoded['action'] : 'update_all';

    // 1. Sync to MySQL if available
    if ($useMySQL) {
        if ($action === 'save_plans' && isset($decoded['plans'])) {
            $mysqli->query("TRUNCATE TABLE plans");
            $stmt = $mysqli->prepare("INSERT INTO plans (plan_id, name, price, billing, badge, is_featured, description, features) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            foreach ($decoded['plans'] as $p) {
                $pId = $p['id'] ?? ('plan_' . rand(100,999));
                $name = $p['name'];
                $price = (int)$p['price'];
                $billing = $p['billing'] ?? '/ one-time';
                $badge = $p['badge'] ?? '';
                $isFeat = !empty($p['isFeatured']) ? 1 : 0;
                $desc = $p['description'] ?? '';
                $feats = json_encode($p['features'] ?? []);
                $stmt->bind_param("ssississ", $pId, $name, $price, $billing, $badge, $isFeat, $desc, $feats);
                $stmt->execute();
            }
        } elseif ($action === 'save_coupons' && isset($decoded['coupons'])) {
            $mysqli->query("TRUNCATE TABLE coupons");
            $stmt = $mysqli->prepare("INSERT INTO coupons (code, type, value, label, active) VALUES (?, ?, ?, ?, ?)");
            foreach ($decoded['coupons'] as $c) {
                $code = strtoupper(trim($c['code']));
                $type = $c['type'] ?? 'percent';
                $val = (int)$c['value'];
                $lbl = $c['label'] ?? '';
                $act = !empty($c['active']) ? 1 : 0;
                $stmt->bind_param("ssisi", $code, $type, $val, $lbl, $act);
                $stmt->execute();
            }
        } elseif ($action === 'add_order' && isset($decoded['order'])) {
            $o = $decoded['order'];
            $stmt = $mysqli->prepare("INSERT INTO orders (order_id, tracking_password, client_name, phone, business, email, plan_name, amount_paid, order_date, stage, status_note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $oid = $o['orderId'];
            $pwd = $o['trackingPassword'];
            $cname = $o['clientName'];
            $phone = $o['phone'];
            $biz = $o['business'];
            $email = $o['email'];
            $plan = $o['planName'];
            $amt = (float)$o['amountPaid'];
            $dt = $o['date'];
            $stg = (int)($o['stage'] ?? 1);
            $note = $o['statusNote'] ?? '';
            $stmt->bind_param("sssssssdiss", $oid, $pwd, $cname, $phone, $biz, $email, $plan, $amt, $dt, $stg, $note);
            $stmt->execute();
        } elseif ($action === 'update_order_stage' && isset($decoded['orderId'])) {
            $oid = $decoded['orderId'];
            $stage = (int)($decoded['stage'] ?? 1);
            $note = $decoded['statusNote'] ?? '';
            $stmt = $mysqli->prepare("UPDATE orders SET stage = ?, status_note = ? WHERE order_id = ?");
            $stmt->bind_param("iss", $stage, $note, $oid);
            $stmt->execute();
        } elseif ($action === 'update_all' && isset($decoded['data'])) {
            if (isset($decoded['data']['orders'])) {
                foreach ($decoded['data']['orders'] as $ord) {
                    $stmt = $mysqli->prepare("UPDATE orders SET stage = ?, status_note = ? WHERE order_id = ?");
                    $stage = (int)($ord['stage'] ?? 1);
                    $note = $ord['statusNote'] ?? '';
                    $oid = $ord['orderId'];
                    $stmt->bind_param("iss", $stage, $note, $oid);
                    $stmt->execute();
                }
            }
        }
    }

    // 2. Also keep data.json synchronized
    $currentData = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : ['plans' => [], 'coupons' => [], 'orders' => []];
    if (!$currentData) $currentData = ['plans' => [], 'coupons' => [], 'orders' => []];

    if ($action === 'save_plans') {
        $currentData['plans'] = $decoded['plans'];
    } elseif ($action === 'save_coupons') {
        $currentData['coupons'] = $decoded['coupons'];
    } elseif ($action === 'add_order') {
        $currentData['orders'][] = $decoded['order'];
    } elseif ($action === 'update_order_stage') {
        foreach ($currentData['orders'] as &$ord) {
            if ($ord['orderId'] === $decoded['orderId']) {
                if (isset($decoded['stage'])) $ord['stage'] = $decoded['stage'];
                if (isset($decoded['statusNote'])) $ord['statusNote'] = $decoded['statusNote'];
                break;
            }
        }
    } elseif ($action === 'update_all' && isset($decoded['data'])) {
        $currentData = $decoded['data'];
    }

    file_put_contents($dataFile, json_encode($currentData, JSON_PRETTY_PRINT));

    echo json_encode([
        'status' => 'success',
        'mysql_connected' => $useMySQL,
        'database' => $useMySQL ? 'agency_db' : 'data.json (fallback)',
        'action' => $action
    ]);
    exit;
}
