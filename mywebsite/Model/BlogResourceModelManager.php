<?php
class BlogResourceModelManager extends Manager{
function BlogResourceModelManager(){
 parent::Manager();
}
function &getListByBlogID($blogID){
$sql = "SELECT * FROM BlogResource WHERE blog_id = $blogID";
return $this->db->query($sql);
}
function &findOneModel($blogResourceID){
$sql = "SELECT * FROM BlogResource WHERE blog_resource_id = $blogResourceID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "BlogResourceModel.php";
$model = new BlogResourceModel($data);
return $model;
}
}
?>
