<?php
namespace Home\Controller;
use Think\Controller;

class AjaxController extends Controller
 {
    public function index()
    {
        $this->display("Ajax/index");
    }
    public function code()
    {

    	// 	$config =  array(  
    	// 	  'fontSize' =>   30,// 验证码字体大小  
    	// 	   'length'    => 3// 验证码位数  
    	// 	  // 'useNoise' =>false,
    	// );
    	// $Verify = new \Think\Verify($config);
    	// $Verify->entry();


    	$Verify = new \Think\Verify();

    	$Verify->fontSize = 30;
    	$Verify->length   = 4;
    	$Verify->useNoise = false;
        $Verify->useCurve=false;
    	// 开启中文验证
    	// $Verify ->useZh =true;
    	// $Verify->fontttf="simhei.ttf";
    	$Verify->entry();

    }

    //系统自带的验证方法
    public function docode($code,$id="")
    {
       
        $verify = new \Think\Verify();
    	return $verify->check($code,$id);
       
    }

    // 用户添加
    public function add()
    {
        if($this->docode(I("get.code")))
        {
            echo '输入正确';
        }else{
            echo "错误";
        }
    }

    //检测ajax的方法
    public function ajaxcode()
    {
       $this->ajaxReturn($this->docode(I("get.code")));//到index页面的data哪里

    }
    
    //设置用户的检测方法
    public function ajaxuser()
    {
        $mod = D("user");
        // var_dump($mod);//(Home\Model\UserModel)[6]
        $mod->create($_GET);
       $data['info']=$mod->getError();
       $data['error']=false;

        if(empty($data['info']))
        {
            $data['info']="用户名可用";
            $data['error']=true;
        }
        $this->ajaxReturn($data);
    }


    
}