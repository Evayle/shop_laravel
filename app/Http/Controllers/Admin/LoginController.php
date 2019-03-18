<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\tp_admin_users;
use App\Model\Admin\tp_admin_user_infos;
use Closure;
use Hash;

class LoginController extends Controller
{

    //用户登录
    public function index(){
        return view('admin.login.login');
    }

    //登录验证
    public function login(){

        //接收所有的传值
        //dump($_POST);
        $data = $_POST['uname'];
        $upass = $_POST['password'];

            $flight= tp_admin_users::where('admin_name',$data)->first();

        //查询验证用户名是否存在,不存在就返回登录页面
        if ($flight == false){
            //验证手机号输入
           $flight= tp_admin_users::where('admin_phon',$data)->first();
            //dump($phon);
            if ($flight == false){
                //验证邮箱输入
                $flight = tp_admin_users::where('admin_email',$data)->first();
                if ($flight == false){
                    return redirect()->route('login',['error'=>404]);
                }
            }
        }
            $pass = $flight['admin_password'];
        //哈希验证密码
        if (Hash::check($upass, $pass)) {
                //echo "密码验证成功";
            }else{
                return redirect('/admin/login');
            }
        // session()->flush();//删除素有的session
        //session()->forget('admin_loginhai'); //删除某个值键

        //在session存入数组
        session(['admin_login.'.'1' => $pass,'admin_login.'.'2' => $data]);

        //判读session是否写入成功
        if(session()->exists('admin_login')){
            $data = session('admin_login')[2];
            $date = DB::table('tp_admin_users')->where('admin_name',$data)->select('id')->first();
            $id = $date->id;


            //登录的权限


           $datt =  DB::select('select n.cname,n.aname from rbac_user_node as n,rbac_users_roles as ur,rbac_rid_nid as rn where ur.uid = '.$id.' and ur.rid = rn.rid and rn.nid = n.id ');
           $arr = [];

           foreach ($datt as $key => $value) {
               $arr[$value->cname][] = $value->aname;
           }
           if($value->aname == "create"){
                $arr[$value->cname][] = 'store';
           }
           if($value->aname == "edit"){
                $arr[$value->cname][] = 'update';
           }

           $arr['indexcontroller'][] = 'index';

           //将获取到的权限压入session
           session(['admin_node_type'=>$arr]);
            return redirect('admin');
        }

    }

    public function session(){
        //session()->flush();
        // session()->forget('admin_login');
        // return redirect()->route('login');

    }
}