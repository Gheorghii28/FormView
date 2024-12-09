<?php
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = strtok($_SERVER['REQUEST_URI'], '?'); // Removes query parameters
$uri = explode('/', trim($requestUri, '/')); // Split the URL into parts

if ($uri[1] === 'table') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'POST':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->create($requestData);
            break;
        case 'GET':
            $userId = isset($_GET['userId']) ? intval($_GET['userId']) : null;
            $tableName = isset($_GET['tableName']) ? $_GET['tableName'] : null;

            if (!$userId || !$tableName) {
                echo json_encode(['status' => 400, 'message' => 'User ID or Table Name is missing']);
                return;
            }

            echo $tableController->getTableData($userId, $tableName);
            break;
        case 'DELETE':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->delete($requestData);
            break;

        // Add additional methods like PUT or DELETE here as needed

        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else if ($uri[1] === 'user' && $uri[2] === 'tables') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'GET':
            $userId = isset($_GET['userId']) ? intval($_GET['userId']) : null;

            if (!$userId) {
                echo json_encode(['status' => 400, 'message' => 'User ID is missing']);
                return;
            }

            echo $tableController->getUserTables($userId);
            break;
        case 'POST':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->updateTableOrder($requestData);
            break;

        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else if ($uri[1] === 'renameTable') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'PUT':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->renameTable($requestData);
            break;

        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else if ($uri[1] === 'column') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'POST':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->addColumn($requestData);
            break;
        case 'PUT':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->renameColumn($requestData);
            break;
        case 'DELETE':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->deleteColumn($requestData);
            break;

        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else if ($uri[1] === 'rows') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'POST':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->storeRow($requestData);
            break;
        case 'PUT':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->updateRow($requestData);
            break;
        case 'DELETE':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->deleteRow($requestData);
            break;
        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else if ($uri[1] === 'reorder' && $uri[2] === 'columns') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'POST':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->updateColumnOrder($requestData);
            break;

        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else if ($uri[1] === 'reorder' && $uri[2] === 'rows') {
    require_once __DIR__ . '/../controllers/TableController.php';

    $tableController = new TableController();

    switch ($requestMethod) {
        case 'POST':
            $requestData = json_decode(file_get_contents('php://input'), true);
            echo $tableController->updateRowOrder($requestData);
            break;

        default:
            echo json_encode(['message' => 'Method not allowed.']);
            break;
    }
} else {
    echo json_encode(['message' => 'Endpoint not found.']);
}

// Comment: You can extend this script to handle other endpoints by adding more `if` conditions
