<?php
//������װ��Ϣʵ��Ļ�����
class Model{
    //���ʵ��������ݣ�
    //example: array("id"=>1, "name"=>"this is name");
    var $data;
    //���ʵ���������Լ����Ϣ�������жϼ����$data���ݵ�׼ȷ��
    //see: ClassModel
    var $match;
    //���ʵ���Ӧ�����ݿ��б������
    var $table;
    //��ʼ��
    function Model(&$data){
        $this->data = &$data;
    }
    //���ø�ʵ���ĳ��������ֵ
    function set($key, $value){
        $this->data[$key] = $value;
    }
    //��ȡ��ʵ���ĳ������
    function get($key){
        return $this->data[$key];
    }
    //��ȡ��ʵ���ȫ������
    function getData(){
     return $this->data;
    }
    //��ȡ��ʵ���Լ����Ϣ
    function getMatch(){
     return $this->match;
    }
    //��֤ʵ�����ݵ�׼ȷ�Ժ�������
    function isValid(){
        foreach($this->match as $key=>$value){
            if(!isset($value["null"]) && !isset($this->data[$key])) {
				die("$key ����ֵ����Ϊ��");
			}
            //.....�����ڼ��������жϣ������Ƿ񳬹�����������ֵ���򳤶ȹ���.....
        }
    }
}
?>
