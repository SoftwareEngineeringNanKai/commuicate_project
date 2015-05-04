<?php class MessageModel extends Model{
function MessageModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "Message"
var $match = array(

"message_id" => array("name"=>"message_id", "type"=>"I"),

"form_id" => array("name"=>"form_id", "type"=>"I"),
"to_id" => array("name"=>"to_id", "type"=>"I"),
"message_title" => array("name"=>"message_title", "type"=>"C"),
"message_content" => array("name"=>"message_content", "type"=>"C"),






);
}
?>