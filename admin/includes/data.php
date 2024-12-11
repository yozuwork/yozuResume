<?php
function mysqli_result($res, $row=0, $col=0) {
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows - 1) && $row >=0) {
        mysqli_data_seek($res, $row);
        $response_row = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($response_row[$col])) {
            return $response_row[$col];
        }
    }
    return false;
}

function qSELECT($query, $object = NULL) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $return = array();
    if($result) {
        $num = mysqli_num_rows($result);
        for ($i=0; $i<$num; $i++) {
            if(!is_null($object)) {
                $row = mysqli_fetch_object($result, MYSQLI_ASSOC);
            }else{
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }
            $return[$i]=$row;
        }
    }
    return $return;
}

function counting($table, $what) {
    global $conn;
    $query = "SELECT COUNT(" . $what . ") FROM ".$table;
    $result = mysqli_query($conn, $query);
    $num = mysqli_result($result, 0, 0);
    return $num;
}

function countingByConditions($table, $what, $conditions) {
    global $conn;
    $query = "SELECT COUNT(" . $what . ") FROM ".$table." WHERE ".$conditions;
    $result = mysqli_query($conn, $query);
    $num = mysqli_result($result, 0, 0);
    return $num;
}

function getByConditions($table, $conditions) {
    $query = "SELECT * FROM ".$table." WHERE ".$conditions;
    $result = qSELECT($query);
    return $result;
}

function getByColumn($table, $column, $value) {
    $query = "SELECT * FROM ".$table." WHERE ".$column."='".$value."'";
    $result = qSELECT($query);
    return $result;
}

function getById($table, $id) {
    $query = "SELECT * FROM ".$table." WHERE id=".$id." ";
    $result = qSELECT($query);
    if($result) return $result[0];
    else return $result;
}

function getAll($table) {
    $query = "SELECT * FROM ".$table;
    $result = qSELECT($query);
    return $result;
}
// 以特定欄位為排序 
function getOrderByAll($table, $orderBy) {
    $query = "SELECT * FROM " . $table;
    if ($orderBy) {
        $query .= " ORDER BY " . $orderBy;
    }
    $result = qSELECT($query);
    return $result;
}
//範例用法
// function getOrderByAll($table, $orderBy = 'sorting') {
//     $query = "SELECT * FROM " . $table;
//     if ($orderBy) {
//         $query .= " ORDER BY " . $orderBy;
//     }
//     $result = qSELECT($query);
//     return $result;
// }

function queryToSelect($table, $where, $operator, $zero_value, $key, $value, $id) {
    $ul = '<option value="'.$zero_value.'">Please select</option>';

    $query = "SELECT * FROM ".$table." WHERE `".$where."` ".$operator." ".$zero_value." ";
    $result = qSELECT($query);
    foreach ($result as $row) {
        $ul .= '<option value="'.$row[$key].'" ';
        $ul .= $id == $row[$key] ? "selected" : "" ;
        $ul .= '>'.$row[$value].'</option>';
    }
    return $ul;
}
?>
