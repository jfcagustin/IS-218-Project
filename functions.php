<?php

//get task id
function taskid($rows){
    global $taskid;
    $taskid = $rows["id"];
    $_SESSION['taskid'] = $taskid;
    return $taskid;
}
?>