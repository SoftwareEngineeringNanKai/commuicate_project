<?php class FileModel extends Model{
function FileModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "File"
var $match = array(

"file_id" => array("name"=>"file_id", "type"=>"I"),
"user_id" => array("name"=>"user_id", "type"=>"I"),
"file_name" => array("name"=>"file_name", "type"=>"C"),
"file_url" => array("name"=>"file_url", "type"=>"C"),


"file_pictrue_url" => array("name"=>"file_pictrue_url", "type"=>"C","null"=>true),
"filr_date" => array("name"=>"filr_date", "type"=>"C","null"=>true),






);
}
?>