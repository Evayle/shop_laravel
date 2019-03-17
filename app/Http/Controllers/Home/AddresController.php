<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\district;
use App\Model\Home\tp_address;
use DB;
use App\Http\Requests\AsStoreBlogPost;
class AddresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //收货地址主页
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');// 注意:这里返回的是一个对象
        $data = DB::table('tp_address')->where('user_id', $uid[0])->orderBy('id','desc')->get();
        return view('home.homepage.address', ['data' => $data]);
    }

    /**
     * 新增一个address方法 用于get传值过来调用此方法
     */
    public function address(Request $request)
    {
        $list = DB::table('district')->where('upid', '=', $_GET)->get();
        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsStoreBlogPost $request)
    {
        //
        $tp_address = new tp_address;
        $data = $request->except('_token');
        // 获取用户的id
        $phon = session()->get('user_login.1');
        $uid = DB::table('home_users')->where('uphon',$phon)->pluck('id');// 注意:这里返回的是一个对象
        $data['user_id'] = $uid[0];
        if (!empty($data['status'])) {
            $data['status'] = 1;
            // $tp_address->status = $data['status'];// 是否启用为默认地址
            // 有值说明设置为默认地址 需要查询该用户的所有地址信息 再查status字段有无设置为1 有则需改动设置status为0 再添加本条数据
            $res['user_id'] = $data['user_id'];
            $res['status'] = 1;
            $info = DB::table('tp_address')->where($res)->get();
            // dump($info);
            if ($info) {

                $upd = DB::table('tp_address')->where($res)->update(['status'=>0]);
                // dump($upd);// 返回改动的行数
            }
        }
        // dump($data);
        $bool = DB::table('tp_address')->insert($data);
        /*$tp_address->user_id = $data['user_id'];// 添加用户id
        $tp_address->name = $data['name'];// 添加收货人姓名
        $tp_address->address = $data['address'];// 添加收货地址
        $tp_address->address_info = $data['address_info'];// 添加详细收货地址
        $tp_address->phone = $data['phone'];// 添加收货手机号码
        $tp_address->code = $data['code'];// 添加地区邮政编码
        $bool = $tp_address->save();*/
        if ($bool) {
            return redirect('/home/address')->with('success','添加成功');
        }else{
            return redirect('/home/address')->with('error','添加失败');
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
        //
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
        // $data = DB::table('tp_address')->where('id', '=', $id)->get();// 这种方法获取数据遍历到前台会出错
        $tp_address = new tp_address;
        $data = $tp_address->find($id);
        // dump($data);
        return view('home.homepage.upaddress', ['data'=>$data]);
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
        //
        $data = $request->except('_method','_token');
        // dump($data);
        // dump($id);
        if (!empty($data['status'])) {
            $data['status'] = 1;
            // $tp_address->status = $data['status'];// 是否启用为默认地址
            // 有值说明设置为默认地址 需要查询该用户的所有地址信息 再查status字段有无设置为1 有则需改动设置status为0 再添加本条数据
            // $res['user_id'] = $data['user_id'];
            $res['status'] = 1;
            $info = DB::table('tp_address')->where($res)->get();
            // dump($info);
            if ($info) {

                $upd = DB::table('tp_address')->where($res)->update(['status'=>0]);
                // dump($upd);// 返回改动的行数
            }
        }
        $bool = DB::table('tp_address')->where('id', '=',$id)->update($data);
        // dump($bool);
        if ($bool) {
            return redirect('/home/address')->with('success','修改成功');
        }else{
            return redirect('/home/address')->with('error','修改失败');
        }
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
        $bool = DB::table('tp_address')->where('id', '=', $id)->delete();
        // dump($bool);
        return back();
        // dump($bool);
    }
    public function add($id)
    {
        $tp_address = new tp_address;
        $data = $tp_address->find($id);
        if ($data['status'] == 0) {
            $data['status'] = 1;
            // $tp_address->status = $data['status'];// 是否启用为默认地址
            // 有值说明设置为默认地址 需要查询该用户的所有地址信息 再查status字段有无设置为1 有则需改动设置status为0 再添加本条数据
            $res['user_id'] = $data['user_id'];
            $res['status'] = 1;
            $info = DB::table('tp_address')->where($res)->get();
            // dump($info);
            if ($info) {
                $upd = DB::table('tp_address')->where($res)->update(['status'=>0]);
                // dump($upd);// 返回改动的行数
                }
            $upd = DB::table('tp_address')->where('id', '=', $id)->update(['status'=>1]);
        }else{
            $upd = DB::table('tp_address')->where('id', '=', $id)->update(['status'=>0]);
        }
        return back();
    }
}
