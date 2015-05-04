<?php class NewsModel extends Model{
function NewsModel(&$data){
parent::Model($data);}
var $data = array();
var $table = "News"
var $match = array(

"news_id" => array("name"=>"news_id", "type"=>"I"),
"news_title" => array("name"=>"news_title", "type"=>"C"),
"news_content" => array("name"=>"news_content", "type"=>"C"),
"news_picture_url" => array("name"=>"news_picture_url", "type"=>"C"),
"news_date" => array("name"=>"news_date", "type"=>"C"),






);
}
?>