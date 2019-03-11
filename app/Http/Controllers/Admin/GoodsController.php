<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsStoreBlogPost;
use App\Model\Admin\tp_goods_categorys;
use App\Model\Admin\tp_goods;
use App\Model\Admin\tp_goods_imgs;
use App\Model\Admin\tp_goods_pics;
use DB;

class GoodsController extends Controller
{
    /**
     * 获取分类排版
     * @return [type] [description]
     */
    public function getCats()
    {
        $cats = tp_goods_categorys::select('*',DB::raw("concat(categorys_path,',',id) as paths"))->orderBy('paths','asc')->get();

        // 拼接上分类排版
        foreach ($cats as $key => $value) {
            // 统计path中 ,出现次数
            $n = substr_count($value->categorys_path, ',');

            // 判断如果不是三级分类则剔除
            if (!($n == 2)) {
                unset($cats[$key]);
            }
        }

        return $cats;
    }

    /**
     * 商品列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.goods.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载添加视图
        return view('admin.goods.create', ['cats' => self::getCats()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsStoreBlogPost $request)
    {
        $data = $request->except(['_token', 'pics_url', 'imgs_url', 'goods_plot']);

        // 检查是否有文件上传
        if ($request->hasFile('goods_plot')) {
            $file = $request->file('goods_plot');// 创建文件上传对象
            
            // 执行文件上传
            $res = $file->store('public');

            // 将'public'替换成'storage'
            $res1 = substr($res, 6);
            $data['goods_plot'] = 'storage'.$res1;
        }else{
            return back();
        }

        $goods = new tp_goods;
        $goods->goods_name = $data['goods_name'];
        $goods->goods_plot = $data['goods_plot'];
        $goods->goods_fsp = $data['goods_fsp'];
        $goods->goods_keywords = $data['goods_keywords'];
        $goods->goods_categorys_id = $data['goods_categorys_id'];
        $goods->goods_describe = $data['goods_describe'];
        $goods->goods_vip = $data['goods_vip'];
        $goods->goods_recommend = $data['goods_recommend'];
        $goods->goods_preferential = $data['goods_preferential'];
        $goods->goods_discount = $data['goods_discount'];

        // 执行添加
        if ($goods->save()) {
            // 同时添加详情图跟缩略图
            $data = $request->only(['pics_url']);
            $data['goods_id'] = $goods->id;
            $files = $request->file('pics_url');
            foreach ($files as $key => $value) {
                $res = $value->store('public');
                $res1 = substr($res, 6);
                $data['pics_url'] = 'storage'.$res1;
                $goods_pics = new tp_goods_pics;
                $goods_pics->pics_url = $data['pics_url'];
                $goods_pics->goods_id = $data['goods_id'];
                $goods_pics->save();
            };

            $data = $request->only(['imgs_url']);
            $data['goods_id'] = $goods->id;
            $files = $request->file('imgs_url');
            foreach ($files as $key => $value) {
                $res = $value->store('public');
                $res1 = substr($res, 6);
                $data['imgs_url'] = 'storage'.$res1;
                $goods_imgs = new tp_goods_imgs;
                $goods_imgs->imgs_url = $data['imgs_url'];
                $goods_imgs->goods_id = $data['goods_id'];
                $goods_imgs->save();
            };

            return redirect('admin/goods')->with('success', '添加成功');
        } else {
            return back()->with('error', '添加失败');
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

    /**
     * 回收站
     * @return [type] [description]
     */
    public function delete()
    {

    }
}
