<?php
//�༶ʵ����Ϣ�Ĺ�����
class AbcModelManager extends Manager{
    //��ʼ��
function AbcModelManager(){
        parent::Manager();
    }
    //��ȡ�༶�б�
    function &getList(){
        $sql = "SELECT * FROM t_abc";
        return $this->db->query($sql);
    }
    //���Ҳ�����һ���༶��ʵ����
    function &findOneModel($id){
	 $sql = "SELECT * FROM t_abc WHERE id = $id";
        //$data = $this->db->getOne($sql);
        $data = $this->db->queryRow($sql);
		if($data==null) 
			die("�ü�¼�����ڣ�");
        require_once "AbcModel.php";
        $model = new AbcModel($data);
        return $model;
    }
}
?>