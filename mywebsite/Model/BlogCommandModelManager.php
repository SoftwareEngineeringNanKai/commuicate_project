<?php
class BlogCommandModelManager extends Manager{
function BlogCommandModelManager(){
 parent::Manager();
}
function &getListByBlogID($blogID){
$sql = "SELECT * FROM BlogCommand WHERE blog_id = $blogID";
return $this->db->query($sql);
}

function &findOneModel($blogCommandID){
$sql = "SELECT * FROM BlogCommand WHERE blog_command_id = $blogCommandID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "BlogCommandModel.php";
$model = new BlogCommandModel($data);
return $model;
}
}
?>
