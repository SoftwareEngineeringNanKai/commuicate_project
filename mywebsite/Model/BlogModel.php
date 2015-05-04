<?php class BlogModel extends Model{
function BlogModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "Blog"
var $match = array(

"blog_id" => array("name"=>"blog_id", "type"=>"I"),
"user_id" => array("name"=>"user_id", "type"=>"I"),
"blog_title" => array("name"=>"blog_title", "type"=>"C"),
"blog_content" => array("name"=>"blog_content", "type"=>"C"),
"blog_type" => array("name"=>"blog_type", "type"=>"I"),
"blog_date" => array("name"=>"blog_date", "type"=>"C","null"=>true),






);
}
?>