<?php
//用来包装学生信息的实体类
class AbcModel extends Model{
	
    var $data = array();
    //$match中，
    //type用来表示数据的类型（I表示整数， C表示是字符串）
    //name用来表示在数据库表中的字段名
    //null表示该字段的值是否准许为空
    //    （数组中有"null"=>true表示是准许为空，否则不能为空）
    var $match = array(
	    "id" => array("name"=>"id", "type"=>"I"),
        "firstname" => array("name"=>"firstname", "type"=>"C","null"=>true),
        "bigname" => array("name"=>"bigname", "type"=>"C", "null"=>true)
	);

    var $table = "t_abc";
    //初始化
    function StudentModel(&$data){
		parent::Model($data);
    }
}
?>



