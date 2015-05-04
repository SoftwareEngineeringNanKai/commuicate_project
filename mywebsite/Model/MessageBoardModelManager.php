<?php
class MessageBoardModelManager extends Manager{
function MessageBoardModelManager(){
 parent::Manager();
}
function &getListByUserID($userID){
$sql = "SELECT * FROM MessageBoard where user_id = $userID";
return $this->db->query($sql);
}
function &findOneModel($messageBoardID){
$sql = "SELECT * FROM MessageBoard WHERE message_board_id = $messageBoardID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "MessageBoardModel.php";
$model = new MessageBoardModel($data);
return $model;
}
}
?>
