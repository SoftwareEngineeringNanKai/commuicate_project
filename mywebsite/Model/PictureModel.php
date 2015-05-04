<?php class PictureModel extends Model{
function PictureModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "Picture"
var $match = array(

"picture_id" => array("name"=>"picture_id", "type"=>"I"),
"user_id" => array("name"=>"user_id", "type"=>"I"),
"picture_name" => array("name"=>"picture_name", "type"=>"C"),
"pictrue_url" => array("name"=>"pictrue_url", "type"=>"C"),
"picture_date" => array("name"=>"picture_date", "type"=>"C"),






);
}
?>