<?php class BlogResourceModel extends Model{
function BlogResourceModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "BlogResource"
var $match = array(

"blog_resource_id" => array("name"=>"blog_resource_id", "type"=>"I"),
"blog_id" => array("name"=>"blog_id", "type"=>"I"),
"blog_resource_name" => array("name"=>"blog_resource_name", "type"=>"C"),
"blog_resource_url" => array("name"=>"blog_resource_url", "type"=>"C"),






);
}
?>