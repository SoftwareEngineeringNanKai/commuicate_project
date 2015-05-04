<?php
class BlogModelManager extends Manager{
function BlogModelManager(){
 parent::Manager();
}
function &getListByUserID($userID){
$sql = "SELECT * FROM Blog WHERE user_id = $userID";
return $this->db->query($sql);
}
function &findOneModel($blogID){
$sql = "SELECT * FROM Blog WHERE blog_id = $blogID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "BlogModel.php";
$model = new BlogModel($data);
return $model;
}
}
?>
