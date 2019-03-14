<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\RedirectResponse;
use App\Model\Home\home_users;
use App\Model\Home\home_integrals;

class TestController extends Controller
{
    public function test(){
        //session()->forget('phon_code');
        //dump(session()->all());

        if(empty($_POST)){
            return redirect()->route('test');
        }
        $phon = $_POST['phone'];
        $pass = Hash::make($_POST['password']);
        $num = 10;

        if($pass == ""){
            return redirect()->route('test',['p=register','reeor'=>2131]);
        }

        //如果验证码错误或者不存在,就返回注册页面
        $phon_code = session()->get('phon_code.1');
        //dd(session()->all());
        $sms = $_POST['smscode'];
        //判断验证是不是正确的;
        if ($phon_code == $sms){
                 DB::beginTransaction();
                $user = 'fcl'.mt_rand(70000000,99999999);
                $data = new home_users;
                $data->uname = $user;
                $data->upass = $pass;
                $data->uphon = $phon;
                $data->usex = 2;
                $date = $data->save();
                $uid = $data->id;
                $integral = new home_integrals;
                $integral->uid = $uid;
                $integral->integral_num = $num;
                $inte = $integral->save();

                    //判断两个数据库是否同时存入到了数据库
                    if ($date && $inte == true) {

                        //成功执行事务
                        DB::commit();
                        //添加登录验证session
                        session(['user_login.'.'1' => $phon]);
                        //删除验证码session
                        session()->forget('phon_code');

                        return redirect('home');


                    }else{
                        //失败执行回滚
                        DB::rollBaCk();
                        return  back();
                    }

            return redirect()->route('home');
        }else{

            return redirect()->route('test',["error"=>123,'p=register']);
        }
        //开启事务

    }


    public function updata(Request $request){


        //接受过来的电话号码

       $phon = $_GET['phon'];

        //$phon = '13711380814';
        //echo $phon;
        //每次发送的随机数
        $phon_code = mt_rand(10000,999999);
        //echo $phon_code;

        exit;
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL

        $smsConf = array(
            'key'   => '9a31136f410089fe82403d8059e66e47', //您申请的APPKEY
            'mobile'    => $phon, //接受短信的用户手机号码
            'tpl_id'    => '132503', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$phon_code //您设置的模板变量，根据实际情况修改
        );

        $content = $this->juhecurl($sendUrl,$smsConf,1); //请求发送短信
        echo json_encode($content);
         if($content){
        $result = json_decode($content,true);
        $error_code = $result['error_code'];
        if($error_code == 0){
            //状态为0，说明短信发送成功
            echo "短信发送成功,短信ID：".$result['result']['sid'];
            session(['phon_code.'.'1' => $phon_code]);

        }else{
            //状态非0，说明失败
            $msg = $result['reason'];
            echo "短信发送失败(".$error_code.")：".$msg;
        }
        }else{
        //返回内容异常，以下可根据业务逻辑自行修改
        echo "请求发送短信失败";
        }
    }
    /**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
    public function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
         return $response;
    }

    public function detetion(){

        // 是否有这个电电话号码
        $phon = $_GET['tel'];
        //$phon = 13543853501;
        $flight = home_users::where('uphon',$phon)->first();
        //dump($flight['uphon']);
         if ($flight == true) {
            echo json_encode('ok');
        }else{
            echo json_encode('false');
            session(['phon_code.'.'1' => 123456]);
        }
    }
}
