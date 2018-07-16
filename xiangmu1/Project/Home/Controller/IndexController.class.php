<?php
namespace Home\Controller;
use Think\Controller;

class IndexController extends Controller
 {
    public function index()
    {
        $this->display("Index/index");
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
    	$Verify->length   = 3;
    	$Verify->useNoise = false;
    	// 开启中文验证
    	// $Verify ->useZh =true;
    	// $Verify->fontttf="simhei.ttf";
    	$Verify->entry();

    }

    public function result()
    {
        // var_dump($_GET);//打错能接受到值
        // var_dump(I("get.code"));
        if($this->docode($_GET['code']))
        {
            echo "验证码输入正确";
        }else{
            echo "验证码输入错误";
        }
         


    }
    //系统自带的验证方法
    public function docode($code,$id="")
    {
        // var_dump($_GET);
        // dump($_SESSION);//加密的验证码
        $verify = new \Think\Verify();
    	return $verify->check($code,$id);
       
    }

    


    
}