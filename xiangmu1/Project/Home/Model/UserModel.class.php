<?php

namespace Home\Model;
use Think\Model;
class UserModel extends Model
 {
   

    protected $_validate = array( 
        array('name','require','用户名必须填写！'), 
        array('name','','帐号名称已经存在！',0,'unique',1), 
        array("passwd","/^[0-9]{2,9}$/","密码格式不正确"),
        array('passwd1','passwd','确认密码不一致',0,'confirm'), 
    );

    protected $_auto =array(

    	array("start","1"),
    	array("passwd","md5",3,"function"),
    	array("addtime","time",3,"function"),
    );
}