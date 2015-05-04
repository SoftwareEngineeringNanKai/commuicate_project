<?php
class MessageModelManager extends Manager{
function MessageModelManager(){
 parent::Manager();
}
function &getListByFromID($fromID){
$sql = "SELECT * FROM Message WHERE form_id = $fromID";
return $this->db->query($sql);
}
function &findOneModel($messageID){
$sql = "SELECT * FROM Message WHERE message_id = $messageID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "MessageModel.php";
$model = new MessageModel($data);
return $model;
}
}
?>
