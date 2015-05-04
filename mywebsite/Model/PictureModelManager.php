<?php
class PictureModelManager extends Manager{
function PictureModelManager(){
 parent::Manager();
}
function &getListByUserID($userID){
$sql = "SELECT * FROM Picture WHERE user_id = $userID";
return $this->db->query($sql);
}
function &findOneModel($pictureID){
$sql = "SELECT * FROM Picture WHERE picture_id = $pictureID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "PictureModel.php";
$model = new PictureModel($data);
return $model;
}
}
?>
