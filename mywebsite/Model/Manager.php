<?php
//��ʵ����Ϣ���й���Ļ�����
class Manager{
    //���ݿ���������
    var $db;
    //��ʼ��
    function Manager(){
     $this->db = new DatabaseManager();
    }
    //���������ݿ��в���ʵ����Ϣ
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
