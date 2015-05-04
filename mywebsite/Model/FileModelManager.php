<?php
class FileModelManager extends Manager{
function FileModelManager(){
 parent::Manager();
}
function &getListByUserID($userID){
$sql = "SELECT * FROM File WHERE user_id = $userID";
return $this->db->query($sql);
}
function &findOneModel($fileID){
$sql = "SELECT * FROM File WHERE file_id = $fileID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "FileModel.php";
$model = new FileModel($data);
return $model;
}
}
?>
