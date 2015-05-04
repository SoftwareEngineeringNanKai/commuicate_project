<?php
/**************************************************************
 *        descript : mysql数据库操作管理类
 *
 *          author : 大龄青年
 *           Email :wenadmin@sina.com
 *                 qq : 303015292
 *             msn : wenguangqing@hotmail.com
 *************************************************************/
/*
 * example 1:  获取序列
 *    <?
 *    $db = new Db();
 *    $result = $db->getSeq('art_id', 2, 1);
 *    ?>
 */
/*
 * example 2:  分页查询
 *    <?
 *    $db = new Db();
 *    $result = $db->&queryPage('select id,name from table', 2, 10, DB_FETCH_ASSOC);
 *    foreach($result as $row)
 *     echo $row['id'],'------'.$row['name'].'<br>';
 *    ?>
 */
/*
 * example 3:  插入数据
 *    <?
 *    $db = new Db();
 *    $result = $db->execute("insert into table (id, name) values(1,'name')");
 *    if($result>0)     echo '插入数据成功';
 *    else                   echo '插入数据失败';
 *    ?>
 */
/*
 * 定义数据库联接选项
 * @var  DB_HOST       string   数据库主机名称或地址
 * @var  DB_NAME       string   数据库名称
 * @var  DB_USER       string   数据库用户名称
 * @var  DB_PWD        string   数据库用户的密码
 * @var  DB_PCONNECT   boolean  是否建立持久连接
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'abc');
define('DB_USER', 'root');
define('DB_PWD', 'root');
define('DB_PCONNECT', true);
/*
 *定义返回数据查询结果的类型
 * @var  DB_FETCH_ASSOC   int  结果调用方式：$result['name']
 * @var  DB_FETCH_NUM     int  结果调用方式：$result[0]
 * @var  DB_FETCH_BOTH    int  结果调用方式：$result['name'] 或 $result[0]
 * @var  DB_FETCH_OBJECT  int  结果调用方式：$result->name
 */
define('DB_FETCH_ASSOC', 0);
define('DB_FETCH_NUM', 1);
define('DB_FETCH_BOTH', 2);
define('DB_FETCH_OBJECT', 3);
/*
 *定义默认序列发生器的名称
 */
define('DB_SEQUENCE_TABLENAME', 'sequences');

class DatabaseManager{
    /*
     * 当前数据库联接选项
     */
    var $dbHost = DB_HOST;
    var $dbName = DB_NAME;
    var $dbType = 'Mysql';
    var $dbUser = DB_USER;
    var $dbPwd = DB_PWD;
    var $pcnn = DB_PCONNECT;
    /*
     * 当前数据库连接
     */
    var $cnn = '';
    /*
     * 数据查询结果的返回类型
     */
    var $queryFetchType = DB_FETCH_BOTH;
    /*
     * 初始化函数
     */
 function DatabaseManager(){
        $this->cnn = ($this->pcnn? mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd):
                                                         mysql_connect($this->dbHost, $this->dbUser, $this->dbPwd))  or
                                                        $this->_halt('数据库连接错误');
        mysql_select_db($this->dbName, $this->cnn) or $this->_halt('数据库选择错误');
    }
    /*
     *  数据查询函数
     *
     * @param $sql        string  数据查询语句
     * @param $fetchType  int     数据查询结果的返回类型
     *
     * @return            array   数据查询结果
     */
    function &query($sql, $fetchType=DB_FETCH_BOTH){
        $data = array();
        $rs = &mysql_query($sql, $this->cnn) or $this->_halt('数据查询错误', $sql);
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
     *  分页数据查询函数
     *
     * @param $sql        string  数据查询语句
     * @param $page       int     当前预查询页码
     * @param $pageSize   int     每页显示多少条纪录
     * @param $fetchType  int     数据查询结果的返回类型
     *
     *         数据查询结果,以及数据的分页信息
     * @return    array('pageSize'    => 每页显示的条数
     *                  'recordCount' => 总纪录数
     *                  'pageCount'   => 总页数
     *                  'page'        => 当前页码
     *                  'isFirst'     => 是否第一页
     *                  'isLast'      => 是否最后一页
     *                  'start'       => 返回结果的第一条纪录的序号
     *                  'sql'         => 查询的sql语句
     *                  'data'        => 查询得到的数据结果
     *                 )
     *                 数据查询结果,以及数据的分页信息
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
     *  进行数据查询只返回第 1 行的数据
     *
     * @param $sql        string  数据查询语句
     * @param $fetchType  int     数据查询结果的返回类型
     *
     * @return            array   数据查询结果
     */
    function &queryRow($sql, $fetchType=DB_FETCH_ASSOC){
        $rs = &mysql_query($sql, $this->cnn) or $this->_halt('单行数据查询错误', $sql);
        $exe = $this->_getCommand($fetchType);
        return $exe($rs);
    }
    /*
     *  进行数据查询只返回第 1 行第 n 列的数据
     *
     * @param $sql        string  数据查询语句
     * @param $field      int     返回数据列的名称 或 数字序号
     *
     * @return            string  返回单个字段的值
     */
    function &getOne($sql, $field = 0){
		//echo $sql;
        $rs = &mysql_query($sql, $this->cnn) or $this->_halt('单个数据查询错误', $sql);
        $row = mysql_fetch_array($rs);
        return $row[$field];
    }
    /*
     *  进行sql语句，包含 DELECT / INSERT / UPDATE.....的执行语句
     *
     * @param $sql        string  数据查询语句
     *
     * @return            string  返回该语句影响的数据行数
     */
    function execute($sql){
        $rs = mysql_query($sql) or $this->_halt('语句执行错误', $sql);
        return mysql_affected_rows($this->cnn);
    }
    /*
     *  得到最后一次插入数据的编号
     */
    function getInsertId(){
        return mysql_insert_id($this->cnn);
    }
    /*
     *  序列发生器，用来生成不重复的序列值
     *
     * @param $fieldName    string  序列的名称
     * @param $step         int     序列号间隔
     * @param $start        int     序列号的起始数值
     *
     * @return              int     新的序列值
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
                $rs = mysql_query($sql) or $this->_halt('创建序列发生器表失败', $sql);
            }
            $rs = mysql_query("INSERT INTO $table VALUES('$fieldName', $start)") or
                       $this->_halt('添加新序列错误', $sql);
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
        die("数据库错误：$msg<br> $errNo : $errStr");
    }
}
?>

