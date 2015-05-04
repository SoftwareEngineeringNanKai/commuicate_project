<?php
//班级实体信息的管理类
class AbcModelManager extends Manager{
    //初始化
function AbcModelManager(){
        parent::Manager();
    }
    //获取班级列表
    function &getList(){
        $sql = "SELECT * FROM t_abc";
        return $this->db->query($sql);
    }
    //查找并返回一个班级的实体类
    function &findOneModel($id){
	 $sql = "SELECT * FROM t_abc WHERE id = $id";
        //$data = $this->db->getOne($sql);
        $data = $this->db->queryRow($sql);
		if($data==null) 
			die("该记录不存在！");
        require_once "AbcModel.php";
        $model = new AbcModel($data);
        return $model;
    }
}
?>