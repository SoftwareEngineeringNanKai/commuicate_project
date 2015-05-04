<?php class MessageBoardModel extends Model{
function MessageBoardModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "MessageBoard"
var $match = array(

"message_board_id" => array("name"=>"message_board_id", "type"=>"I"),

"message_board_title" => array("name"=>"message_board_title", "type"=>"C"),
"message_board_content" => array("name"=>"message_board_content", "type"=>"C"),
"message_board_date" => array("name"=>"message_board_date", "type"=>"C"),






);
}
?>