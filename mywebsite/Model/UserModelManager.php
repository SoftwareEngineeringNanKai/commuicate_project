<?php
class UserModelManager extends Manager{
function UserModelManager(){
 parent::Manager();
}
function &getList(){
$sql = "SELECT * FROM User";
return $this->db->query($sql);
}
function &findOneModel($userID){
$sql = "SELECT * FROM User WHERE user_id = $userID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "UserModel.php";
$model = new UserModel($data);
return $model;
}
}
?>
