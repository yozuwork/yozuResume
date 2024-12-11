<?php

header("Content-Type:text/html; charset=utf-8");
include("connect.php");

/******************************************
 *       通用參數      *
 ******************************************/

$cat = $_POST['cat'] ?? $_GET['cat'] ?? '';
$act = $_POST['act'] ?? $_GET['act'] ?? '';
$id = isset($_POST['id']) ? (int)$_POST['id'] : (isset($_GET['id']) ? (int)$_GET['id'] : 0);
$page = isset($_POST['page']) ? (int)$_POST['page'] : (isset($_GET['page']) ? (int)$_GET['page'] : 1);


/******************************************
 *       通用增刪查改方法 -      *
 ******************************************/

function insertIntoTable($conn, $table, $data, $page, $checkField = null) {
    // 如果提供了要檢查重複的欄位，先檢查是否存在重複 
    // 我這邊預設是先null 如果要檢查username的欄位，就要在呼叫的時候指定 變成下面兩段範例
    // function insertIntoTable($conn, $table, $data, $page, $checkField)
    // insertIntoTable($conn, 'users', $data ,$page, 'username');
    if ($checkField !== null && isset($data[$checkField])) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `$table` WHERE `$checkField` = ?");
        $stmt->bind_param("s", $data[$checkField]);
        $stmt->execute();
        $stmt->bind_result($exists);
        $stmt->fetch();
        $stmt->close();

        if ($exists > 0) {
            echo "<script>alert('使用者名稱已重複，請重新輸入'); window.history.back();</script>";
            exit; // 停止後續執行
        }
    }
    // 查詢當前最大的 sorting 值
    $stmt = $conn->prepare("SELECT MAX(sorting) FROM `$table`"); 
    $stmt->execute(); 
    $stmt->bind_result($maxSorting); 
    $stmt->fetch(); 
    $stmt->close(); 

    // 設定新的 sorting 值
    $data['sorting'] = $maxSorting !== null ? $maxSorting + 1 : 1;

    // 動態生成 SQL 語句並插入資料
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_fill(0, count($data), '?'));
    $sql = "INSERT INTO `$table` ($columns) VALUES ($placeholders)";
    $stmt = $conn->prepare($sql);

    // 綁定參數
    $types = str_repeat('s', count($data)); // 假設所有欄位都是字串
    $stmt->bind_param($types, ...array_values($data));

    if ($stmt->execute()) {
        echo "資料已成功插入到 $table 表格。";
    } else {
        echo "插入時發生錯誤: " . $stmt->error;
    }


    $stmt->close();

    // 檢查當前表格中的總記錄數
    $stmt = $conn->prepare("SELECT COUNT(*) FROM `$table`");
    $stmt->execute();
    $stmt->bind_result($total_records);
    $stmt->fetch();
    $stmt->close();

    $items_per_page = 10; // 每頁顯示的資料筆數
    // 計算總頁數
    $total_pages = ceil($total_records / $items_per_page);

    header("Location: ../$table.php?page=" . $total_pages . "&action=add_success");
    exit;
}
function deleteFromTable($conn, $table, $id,$page) {
    if (!empty($id)) {
        // 刪除記錄
        $stmt = $conn->prepare("DELETE FROM `$table` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // 重新排列 sorting，避免斷層
        $stmt = $conn->prepare("SELECT `id` FROM `$table` ORDER BY `sorting` ASC");
        $stmt->execute();
        $stmt->bind_result($record_id);

        $record_ids = [];
        while ($stmt->fetch()) {
            $record_ids[] = $record_id;
        }
        $stmt->close();

        // 重新設定 sorting
        $new_order = 1;
        $update_stmt = $conn->prepare("UPDATE `$table` SET `sorting` = ? WHERE `id` = ?");
        foreach ($record_ids as $id) {
            $update_stmt->bind_param("ii", $new_order, $id);
            $update_stmt->execute();
            $new_order++;
        }
        $update_stmt->close();

        // 檢查當前表格中的總記錄數
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `$table`");
        $stmt->execute();
        $stmt->bind_result($total_records);
        $stmt->fetch();
        $stmt->close();

        $items_per_page = 10; // 每頁顯示的資料筆數
        // 計算總頁數
        $total_pages = ceil($total_records / $items_per_page);

        // 如果刪除後當前頁超出總頁數，則跳回上一頁
        if ($page  > $total_pages) {
            $page  = $total_pages;
        }

        echo "資料已成功刪除。";
    }

    // 刪除完成後重定向到相應的頁面
    header("Location: ../$table.php?page=$page&action=delete_success");
    exit;
}
function editTable($conn, $table, $data, $id, $page) {
    if (!empty($id) && !empty($data)) {
        // 如果是 users 表格，先檢查 username
        if ($table === 'users' && isset($data['username'])) {
            checkUsername($conn, $id, $data['username']);
        }
         // 如果 sorting 是從 URL 中傳遞過來的，則將它加入 $data 中
         if (isset($_GET['sorting'])) {
            $sorting = (int)$_GET['sorting'];
            // 確認當前記錄的排序值
            $stmt = $conn->prepare("SELECT `sorting` FROM `$table` WHERE `id` = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($current_sorting);
            $stmt->fetch();
            $stmt->close();

            // 若 sorting 有變化，則需要重新排序
            if ($sorting != $current_sorting) {
                if ($sorting < $current_sorting) {
                    $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = `sorting` + 1 WHERE `sorting` >= ? AND `sorting` < ? AND `id` != ?");
                    $stmt->bind_param("iii", $sorting, $current_sorting, $id);
                } else {
                    $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = `sorting` - 1 WHERE `sorting` <= ? AND `sorting` > ? AND `id` != ?");
                    $stmt->bind_param("iii", $sorting, $current_sorting, $id);
                }
                $stmt->execute();
                $stmt->close();
            }
            // 若 sorting 有變化，則需要重新排序
            if ($sorting != $current_sorting) {
                if ($sorting < $current_sorting) {
                    $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = `sorting` + 1 WHERE `sorting` >= ? AND `sorting` < ? AND `id` != ?");
                    $stmt->bind_param("iii", $sorting, $current_sorting, $id);
                } else {
                    $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = `sorting` - 1 WHERE `sorting` <= ? AND `sorting` > ? AND `id` != ?");
                    $stmt->bind_param("iii", $sorting, $current_sorting, $id);
                }
                $stmt->execute();
                $stmt->close();
            }

            // 更新當前記錄的 sorting 值
            $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = ? WHERE `id` = ?");
            $stmt->bind_param("ii", $sorting, $id);
            
            if ($stmt->execute()) {
                echo "排序值已成功更新。";
            } else {
                echo "更新排序值時發生錯誤: " . $stmt->error;
            }
            
            $stmt->close();
            // 完成後跳轉
            header("Location: ../$table.php?page=$page&action=edit_success");
            exit;



        }

        // 檢查是否有 sorting 欄位要更新
        if (isset($data['sorting'])) {
            $new_sorting = $data['sorting'];
        
            // 確認當前記錄的排序值
            $stmt = $conn->prepare("SELECT `sorting` FROM `$table` WHERE `id` = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($current_sorting);
            $stmt->fetch();
            $stmt->close();
        
            // 若 `sorting` 有變化，則需要重新排序
            if ($new_sorting != $current_sorting) {
                if ($new_sorting < $current_sorting) {
                    $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = `sorting` + 1 WHERE `sorting` >= ? AND `sorting` < ? AND `id` != ?");
                    $stmt->bind_param("iii", $new_sorting, $current_sorting, $id);
                } else {
                    $stmt = $conn->prepare("UPDATE `$table` SET `sorting` = `sorting` - 1 WHERE `sorting` <= ? AND `sorting` > ? AND `id` != ?");
                    $stmt->bind_param("iii", $new_sorting, $current_sorting, $id);
                }
                $stmt->execute();
                $stmt->close();
            }
        }

        // 動態生成欄位和值的 SQL 語句
        $columns = array_keys($data);
        $values = array_values($data);

        // 構建 SET 部分的 SQL 語句： `column1` = ?, `column2` = ?, ...
        $setPart = implode(", ", array_map(function($column) {
            return "`$column` = ?";
        }, $columns));

        // 準備 SQL 語句
        $sql = "UPDATE `$table` SET $setPart WHERE `id` = ?";
        $stmt = $conn->prepare($sql);

        // 生成類型字符串（假設所有欄位都是字串's'，你可以根據具體情況修改）
        $types = str_repeat('s', count($data)) . 'i'; // 最後的 'i' 是 ID 的類型
        $values[] = $id; // 將 ID 添加到 values 陣列的最後
        $stmt->bind_param($types, ...$values);

        // 執行更新操作
        if ($stmt->execute()) {
            echo "資料已成功更新。";
        } else {
            echo "更新時發生錯誤: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "無效的 ID 或無數據可更新。";
    }

    // 操作完成後重定向
    header("Location: ../$table.php?page=$page&action=edit_success");
    exit;
}

/******************************************
 *       個別方法        *
 ******************************************/

// for users  檢查重複帳號名稱涵式
function checkUsername($conn, $id, $new_username) {
    // 獲取當前記錄的 username
    $stmt = $conn->prepare("SELECT `username` FROM `users` WHERE `id` = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($current_username);
    $stmt->fetch();
    $stmt->close();

    // 如果新 username 與當前的不同，則檢查是否重複
    if ($new_username !== $current_username) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM `users` WHERE `username` = ?");
        $stmt->bind_param("s", $new_username);
        $stmt->execute();
        $stmt->bind_result($user_exists);
        $stmt->fetch();
        $stmt->close();

        if ($user_exists > 0) {
            echo "<script>alert('當前帳號名稱已重複，請重新命名'); window.history.back();</script>";
            exit;
        }
    }
}

/******************************************
 *       各個表格設定        *
 ******************************************/

if($cat == 'users'){
    // 使用範例：插入到 users 表格，並檢查 username 是否重複
    $name = $_POST["name"] ?? $GET["name"] ?? '';
    $username = $_POST["username"] ?? $GET["username"] ?? '';
    $password = $_POST["password"] ?? $GET["password"] ?? '';
    $role = $_POST["role"] ?? $GET["role"] ?? '';
    $sorting = $_POST["sorting"] ?? $GET["sorting"] ?? '';
    $data = [
        'name' => $name,
        'username' => $username,
        'password' => md5($password),
        'role' => $role,
        'sorting' => $sorting
    ];
    if($act == "add"){
        insertIntoTable($conn, 'users', $data ,$page);
    }
    if($act == "edit"){
        editTable($conn, 'users', $data, $id,$page);
    }
    if($act == "delete"){
        deleteFromTable($conn, 'users', $id,$page);
    }
}











?>