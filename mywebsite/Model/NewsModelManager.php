<?php
//have some problems to be solved
class NewsModelManager extends Manager{
function NewsModelManager(){
 parent::Manager();
}
function &getListByNewsDate($newsDate){
$sql = "SELECT * FROM News WHERE news_date = '$newsDate'";
return $this->db->query($sql);
}
function &findOneModel($newsID){
$sql = "SELECT * FROM News WHERE news_id = $newsID";
$data = $this->db->queryRow($sql);
if($data==null)
die("not exist!!!");
require_once "NewsModel.php";
$model = new NewsModel($data);
return $model;
}
}
?>
