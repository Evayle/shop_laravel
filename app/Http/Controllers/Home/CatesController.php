<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home\home_users;
use App\Model\Admin\tp_goods_categorys;
use DB;
class CatesController extends Controller
{
    /**

     * 获取分类数据
     * @param  integer $pid [description]
     * @return [type]       [description]
     */
    public function getPidCates($pid = 0)
    {
        $cates_data = tp_goods_categorys::where('categorys_pid', $pid)->where('categorys_display', 0)->get();
        $array = [];
        foreach ($cates_data as $key => $value) {
            $value['sub'] = self::getPidCates($value->id);
            $array[] = $value;
        }

        return $array;
    }

    /**
     * //商品分类主页
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // 接收值
        $id = $request->input('id');
        $search = $request->input('search');
        $rest = $request->except('i', 'j');

        // 赋予默认值
        $ord = 'id';
        $er = 'asc';
        $i = 1;
        $j = 1;


        // 价格升降序
        if (!empty($request->input('i'))) {
            // 如果传入的$i值为2, 那么说明该按钮为升序效果
            if ($request->input('i') == 2) {
                // 升序
                $ord = 'goods_price';
                $er = 'asc';
                $i = 2;
            } else {
                // 降序1
                $ord = 'goods_price';
                $er = 'desc';
                $i = 1;
            }
        }

        // 销量升降序
        if (!empty($request->input('j'))) {
            // 如果传入的$j值为2, 那么说明该按钮为升序效果
            if ($request->input('j') == 2) {
                // 升序
                $ord = 'goods_sales';
                $er = 'asc';
                $j = 2;
            } else {
                // 降序
                $ord = 'goods_sales';
                $er = 'desc';
                $j = 1;
            }
        }

        if (($id || $search) == false) {
            // 如果没有这两个参数则默认查询全部商品
            $cats = DB::table('tp_goods')->where('goods_status', 1)->orderBy($ord, $er)->paginate(20);
        } else if(($id == true) && ($search == false)) {
            // 判断是否有该三级分类
            $bool = DB::table('tp_goods')->where('goods_status', 1)->where('goods_categorys_id', $id)->first();
            
            // 如果不是三级分类, 返回上一级
            if (empty($bool)) {
                return back();
            }

            $cats = DB::table('tp_goods')->where('goods_status', 1)->where('goods_categorys_id', $id)->orderBy($ord, $er)->paginate(20);
        } else if(($search == true) && ($id == false)) {
            // 字符串查询
            $cats = DB::table('tp_goods')->where('goods_status', 1)->where('goods_name', 'like', '%'.$search.'%')->orderBy($ord, $er)->paginate(20);
        } else {
            // 其他情况返回即可
            return back();
        }

        // 爆款推荐信息
        $hot = DB::table('tp_goods')->where('goods_status', 1)->orderBy('goods_sales', 'desc')->limit(10)->get();

        //加载分类详情视图
        return view('home.cates.index', ['cats' => $cats, 'hot' => $hot, 'i' => $i, 'j' => $j, 'request' => $rest, 'common_cates_data' => self::getPidCates()]);
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
