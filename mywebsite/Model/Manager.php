<?php
//对实体信息进行管理的基础类
class Manager{
    //数据库管理类对象
    var $db;
    //初始化
    function Manager(){
     $this->db = new DatabaseManager();
    }
    //用来向数据库中插入实体信息
    function insert(&$model){
     $model->isvalid();
        $table = $model->table;
        $match = $model->getMatch();
        $data = $model->getData();
        $str1 = $str2 = array();
        foreach($match as $key=>$value){
         if(isset($data[$key])){
             $str1[] = $key;
                $str2[] = ($value["type"]=="C")? "\"".$data[$key]."\"": $data[$key];
            }
        }
        $sql = "INSERT INTO $table (".implode(",", $str1).") VALUES(".implode(",", $str2).")";
        return $this->db->execute($sql);
    }
}
?>
