<?php class BlogCommandModel extends Model{
function BlogCommandModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "BlogCommand"
var $match = array(

"blog_command_id" => array("name"=>"blog_command_id", "type"=>"I"),
"blog_id" => array("name"=>"blog_id", "type"=>"I"),
"blog_command_text" => array("name"=>"blog_command_text", "type"=>"C"),






);
}
?>