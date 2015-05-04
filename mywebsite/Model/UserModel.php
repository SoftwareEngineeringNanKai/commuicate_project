<?php class UserModel extends Model{
function UserModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "User"
var $match = array(

"user_id" => array("name"=>"user_id", "type"=>"I"),

"user_real_name" => array("name"=>"user_real_name", "type"=>"C","null"=>true),
"user_birthday" => array("name"=>"user_birthday", "type"=>"C","null"=>true),

"user_email" => array("name"=>"user_email", "type"=>"C"),
"user_phone" => array("name"=>"user_phone", "type"=>"C","null"=>true),
"user_career" => array("name"=>"user_career", "type"=>"C","null"=>true),
"user_address" => array("name"=>"user_address", "type"=>"C","null"=>true),




);
}
?>