<?php
//������װѧ����Ϣ��ʵ����
class AbcModel extends Model{
	
    var $data = array();
    //$match�У�
    //type������ʾ���ݵ����ͣ�I��ʾ������ C��ʾ���ַ�����
    //name������ʾ�����ݿ���е��ֶ���
    //null��ʾ���ֶε�ֵ�Ƿ�׼��Ϊ��
    //    ����������"null"=>true��ʾ��׼��Ϊ�գ�������Ϊ�գ�
    var $match = array(
	    "id" => array("name"=>"id", "type"=>"I"),
        "firstname" => array("name"=>"firstname", "type"=>"C","null"=>true),
        "bigname" => array("name"=>"bigname", "type"=>"C", "null"=>true)
	);

    var $table = "t_abc";
    //��ʼ��
    function StudentModel(&$data){
		parent::Model($data);
    }
}
?>



