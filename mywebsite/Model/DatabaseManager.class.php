<?php
/**************************************************************
 *        descript : mysql���ݿ����������
 *
 *          author : ��������
 *           Email :wenadmin@sina.com
 *                 qq : 303015292
 *             msn : wenguangqing@hotmail.com
 *************************************************************/
/*
 * example 1:  ��ȡ����
 *    <?
 *    $db = new Db();
 *    $result = $db->getSeq('art_id', 2, 1);
 *    ?>
 */
/*
 * example 2:  ��ҳ��ѯ
 *    <?
 *    $db = new Db();
 *    $result = $db->&queryPage('select id,name from table', 2, 10, DB_FETCH_ASSOC);
 *    foreach($result as $row)
 *     echo $row['id'],'------'.$row['name'].'<br>';
 *    ?>
 */
/*
 * example 3:  ��������
 *    <?
 *    $db = new Db();
 *    $result = $db->execute("insert into table (id, name) values(1,'name')");
 *    if($result>0)     echo '�������ݳɹ�';
 *    else                   echo '��������ʧ��';
 *    ?>
 */
/*
 * �������ݿ�����ѡ��
 * @var  DB_HOST       string   ���ݿ��������ƻ��ַ
 * @var  DB_NAME       string   ���ݿ�����
 * @var  DB_USER       string   ���ݿ��û�����
 * @var  DB_PWD        string   ���ݿ��û�������
 * @var  DB_PCONNECT   boolean  �Ƿ����־�����
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'abc');
define('DB_USER', 'root');
define('DB_PWD', 'root');
define('DB_PCONNECT', true);
/*
 *���巵�����ݲ�ѯ���������
 * @var  DB_FETCH_ASSOC   int  ������÷�ʽ��$result['name']
 * @var  DB_FETCH_NUM     int  ������÷�ʽ��$result[0]
 * @var  DB_FETCH_BOTH    int  ������÷�ʽ��$result['name'] �� $result[0]
 * @var  DB_FETCH_OBJECT  int  ������÷�ʽ��$result->name
 */
define('DB_FETCH_ASSOC', 0);
define('DB_FETCH_NUM', 1);
define('DB_FETCH_BOTH', 2);
define('DB_FETCH_OBJECT', 3);
/*
 *����Ĭ�����з�����������
 */
define('DB_SEQUENCE_TABLENAME', 'sequences');

class DatabaseManager{
    /*
     * ��ǰ���ݿ�����ѡ��
     */
    var $dbHost = DB_HOST;
    var $dbName = DB_NAME;
    var $dbType = 'Mysql';
    var $dbUser = DB_USER;
    var $dbPwd = DB_PWD;
    var $pcnn = DB_PCONNECT;
    /*
     * ��ǰ���ݿ�����
     */
    var $cnn = '';
    /*
     * ���ݲ�ѯ����ķ�������
     */
    var $queryFetchType = DB_FETCH_BOTH;
    /*
     * ��ʼ������
     */
 function DatabaseManager(){
        $this->cnn = ($this->pcnn? mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd):
                                                         mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd))  or
                                                        $this->_halt('���ݿ����Ӵ���');
        mysql_select_db($this->dbName, $this->cnn) or $this->_halt('���ݿ�ѡ�����');
    }
    /*
     *  ���ݲ�ѯ����
     *
     * @param $sql        string  ���ݲ�ѯ���
     * @param $fetchType  int     ���ݲ�ѯ����ķ�������
     *
     * @return            array   ���ݲ�ѯ���
     */
    function &query($sql, $fetchType=DB_FETCH_BOTH){
        $data = array();
        $rs = &mysql_query($sql, $this->cnn) or $this->_halt('���ݲ�ѯ����', $sql);
        $exe = $this->_getCommand($fetchType);
        while($row=&$exe($rs)){
			//$data[] = &$row;
			array_push($data,$row);
			//echo ' row : '.$row[1];
			//echo ' data[] : '.$data[1];
		}
        return $data;
    }
    /*
     *  ��ҳ���ݲ�ѯ����
     *
     * @param $sql        string  ���ݲ�ѯ���
     * @param $page       int     ��ǰԤ��ѯҳ��
     * @param $pageSize   int     ÿҳ��ʾ��������¼
     * @param $fetchType  int     ���ݲ�ѯ����ķ�������
     *
     *         ���ݲ�ѯ���,�Լ����ݵķ�ҳ��Ϣ
     * @return    array('pageSize'    => ÿҳ��ʾ������
     *                  'recordCount' => �ܼ�¼��
     *                  'pageCount'   => ��ҳ��
     *                  'page'        => ��ǰҳ��
     *                  'isFirst'     => �Ƿ��һҳ
     *                  'isLast'      => �Ƿ����һҳ
     *                  'start'       => ���ؽ���ĵ�һ����¼�����
     *                  'sql'         => ��ѯ��sql���
     *                  'data'        => ��ѯ�õ������ݽ��
     *                 )
     *                 ���ݲ�ѯ���,�Լ����ݵķ�ҳ��Ϣ
     */
    function &queryPage($sql, $page=1, $pageSize=20, $fetchType=DB_FETCH_BOTH){
		//echo 'reach there';
        $countSql = preg_replace('|SELECT.*FROM|i','SELECT COUNT(*) count FROM', $sql);
        $data['pageSize'] = (int)$pageSize<1? 20: (int)$pageSize;
        $data['recordCount'] = $this->getOne($countSql, 'count');
        $data['pageCount'] = ceil($data['recordCount']/$data['pageSize']);
        $data['page'] = $data['pageCount']==0? 0: ((int)$page<1? 1: (int)$page);
        $data['page'] = $data['page']>$data['pageCount']? $data['pageCount']:$data['page'];
        $data['isFirst'] = $data['page']>1? false: true;
        $data['isLast'] = $data['page']<$data['pageCount']? false: true;
        $data['start'] = ($data['page']==0)? 1: ($data['page']-1)*$data['pageSize']+1;
        $data['sql'] = $sql.' LIMIT '.($data['start']-1).','.$data['pageSize'];
        $data['data'] = &$this->query($data['sql'], $fetchType);
        return $data;
    }
    /*
     *  �������ݲ�ѯֻ���ص� 1 �е�����
     *
     * @param $sql        string  ���ݲ�ѯ���
     * @param $fetchType  int     ���ݲ�ѯ����ķ�������
     *
     * @return            array   ���ݲ�ѯ���
     */
    function &queryRow($sql, $fetchType=DB_FETCH_ASSOC){
        $rs = &mysql_query($sql, $this->cnn) or $this->_halt('�������ݲ�ѯ����', $sql);
        $exe = $this->_getCommand($fetchType);
        return $exe($rs);
    }
    /*
     *  �������ݲ�ѯֻ���ص� 1 �е� n �е�����
     *
     * @param $sql        string  ���ݲ�ѯ���
     * @param $field      int     ���������е����� �� �������
     *
     * @return            string  ���ص����ֶε�ֵ
     */
    function &getOne($sql, $field = 0){
		//echo $sql;
        $rs = &mysql_query($sql, $this->cnn) or $this->_halt('�������ݲ�ѯ����', $sql);
        $row = mysql_fetch_array($rs);
        return $row[$field];
    }
    /*
     *  ����sql��䣬���� DELECT / INSERT / UPDATE.....��ִ�����
     *
     * @param $sql        string  ���ݲ�ѯ���
     *
     * @return            string  ���ظ����Ӱ�����������
     */
    function execute($sql){
        $rs = mysql_query($sql) or $this->_halt('���ִ�д���', $sql);
        return mysql_affected_rows($this->cnn);
    }
    /*
     *  �õ����һ�β������ݵı��
     */
    function getInsertId(){
        return mysql_insert_id($this->cnn);
    }
    /*
     *  ���з��������������ɲ��ظ�������ֵ
     *
     * @param $fieldName    string  ���е�����
     * @param $step         int     ���кż��
     * @param $start        int     ���кŵ���ʼ��ֵ
     *
     * @return              int     �µ�����ֵ
     */
    function getSeq($fieldName, $step=1, $start=1){
        $table = DB_SEQUENCE_TABLENAME;
        $step = (int)$step;
        $start = (int)$start;
        $rs = mysql_query("UPDATE $table SET seq_num=seq_num+($step) WHERE seq_name='$fieldName'");
        if(!$rs || mysql_affected_rows($this->cnn)<1){
            $rs = mysql_query('SELECT * FROM '.DB_SEQUENCE_TABLENAME, $this->cnn);
            if(!$rs){
                $sql = "CREATE TABLE $table (
                               seq_name VARCHAR( 20 ) NOT NULL ,
                               seq_num BIGINT( 20 ) DEFAULT 1 NOT NULL ,
                               PRIMARY KEY (seq_name))";
                $rs = mysql_query($sql) or $this->_halt('�������з�������ʧ��', $sql);
            }
            $rs = mysql_query("INSERT INTO $table VALUES('$fieldName', $start)") or
                       $this->_halt('��������д���', $sql);
            $seq = $start;
        }else{
            $seq = &$this->getOne("SELECT seq_num FROM $table WHERE seq_name='$fieldName'");
        }
        return $seq;
    }

    function _getCommand($fetchType){
        switch($fetchType){
            case DB_FETCH_ASSOC: $exe = 'mysql_fetch_assoc'; break;
            case DB_FETCH_NUM: $exe = 'mysql_fetch_row'; break;
            case DB_FETCH_BOTH: $exe = 'mysql_fetch_array'; break;
            case DB_FETCH_OBJECT: $exe = 'mysql_fetch_object'; break;
            default: $exe = 'mysql_fetch_array'; break;
        }
        return $exe;
    }

    function _halt($msg){
        $errNo = mysql_errno($this->cnn);
        $errStr = mysql_error($this->cnn);
        die("���ݿ����$msg<br> $errNo : $errStr");
    }
}
?>

