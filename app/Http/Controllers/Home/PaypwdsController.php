<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class PaypwdsController extends Controller
{
    /**
     * 用户的密码验证
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //用户支付跳转的页面
        //确认是不是本用户操作
        $uphon = session('user_login')[1];

        return view('home.homepage.upass_1',['uphon'=>$uphon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = session('pass_code')[1];
        $res = $request->input('sms');
        if($session == $res){
         //跳转页面
         return redirect('/home/payupss/send1');

        }else{
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 123;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    echo 123;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function send(Request $request){

        //接受过来的电话号码

       $phon = $_GET['phon'];

        //$phon = '13711380814';
        //echo $phon;
        //每次发送的随机数
        $phon_code = mt_rand(10000,999999);
        //echo $phon_code;

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
            session(['pass_code.'.'1' => $phon_code]);

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
    public function send1()
    {

        return view('home.homepage.upass_2');
    }
    public function send2(Request $request)
    {
        $uphon = session('user_login')[1];
        $res['upay'] = Hash::make($request->input('phone'));


        $date = DB::table('home_users')->where('uphon',$uphon)->update($res);
        if($date == true){
            //删除session
            session()->forget('pass_code');
            return redirect('/home/payupss/send3');
        }else{
            return back();
        }


    }
    public function send3(){
        return view('home.homepage.upass_3');
    }


}
