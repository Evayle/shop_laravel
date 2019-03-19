<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\home_users;
use App\Model\Home\home_integrals;


use App\Model\Admin\tp_goods_categorys;
use DB;
class IndexController extends Controller
{
    /**

     * 获取分类数据
     * @param  integer $pid [description]
     * @return [type]       [description]
     */
    public function getPidCates($pid = 0)
    {
        $cates_data = tp_goods_categorys::where('categorys_pid', $pid)->get();
        $array = [];
        foreach ($cates_data as $key => $value) {
            $value['sub'] = self::getPidCates($value->id);
            $array[] = $value;
        }

        return $array;
    }

    /**
     * 获取子分类下的所有商品
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getCates($data)
    {
        // 获取顶级分类的id
        $cid = DB::table('tp_goods_categorys')->where('categorys_name', $data)->first()->id;
        // 根据顶级分类的id获取二级分类的id
        $pid = DB::table('tp_goods_categorys')->where('categorys_pid', $cid)->get();

        // 根据带有二级分类id的三级分类的path路径为条件, 找出三级分类的id
        foreach ($pid as $k => $v) {
            $cateid[] = DB::table('tp_goods_categorys')->where('categorys_path', 'like', '%'.$v->id)->get();
        }

        // 将获取的三级分类的id转化成一维数组
        foreach ($cateid as $k => $v) {
            foreach ($v as $kk => $vv) {
                $arr[] = $vv->id;
            }
        }

        // 根据众多三级分类找出该顶级分类下所有商品数据
        foreach ($arr as $k => $v) {
            $data1[] = DB::table('tp_goods')->where('goods_categorys_id', $v)->orderBy('goods_sales', 'desc')->get();
        }

        // 将获取的所有商品数据转化为二维数组, 便于遍历
        $val = [];
        foreach ($data1 as $k => $v) {
            foreach ($v as $kk => $vv) {
                if (!empty($val[7])) {// 限定条数为8
                    return $val;
                }
                $val[] = $vv;
            }
        }

    }

    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // 爆款数据
        $hot = DB::table('tp_goods')->orderBy('goods_sales', 'desc')->limit(6)->get();

        // 女装数据

        //利用session查询用户的登录账号
        $user = session()->get('user_login.1');
        $flight = home_users::where('uphon',$user)->first();

        //查询用户详情表的数据
        $uid  = $flight['id'];
        $home_integrals = home_integrals::where('uid',$uid)->first();

        //把查询的用户信息,传递到首页界面
        return view('home.index.index',['data'=>$flight, 'date'=>$home_integrals, 'common_cates_data' => self::getPidCates(), 'hot' => $hot, 'nv' => self::getCates('女装'), 'nan' => self::getCates('男装'), 'bao' => self::getCates('包包'), 'tong' => self::getCates('童装'), 'xie' => self::getCates('鞋靴')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
