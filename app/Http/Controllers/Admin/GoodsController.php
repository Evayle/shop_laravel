<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GoodsStoreBlogPost;
use App\Http\Requests\GoodsEditStoreBlogPost;
use App\Model\Admin\tp_goods_categorys;
use App\Model\Admin\tp_goods;
use App\Model\Admin\tp_goods_imgs;
use App\Model\Admin\tp_goods_pics;
use DB;
use Illuminate\Support\Facades\Storage;

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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $goods = tp_goods::where('goods_name', 'like', '%'.$search.'%')->paginate(10);

        $ctegs = new tp_goods_categorys;
        // 加载前台视图
        return view('admin.goods.index',['goods' => $goods, 'request' => $request->all(), 'ctegs' => $ctegs]);

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
            $res = $file->store('public/admin/fm');

            // 将'public'替换成'storage'
            $res1 = substr($res, 6);
            $data['goods_plot'] = 'storage'.$res1;
        }else{
            return back();
        }


        $id = DB::table('tp_goods')->insertGetId($data);

        // 执行添加后跳转
        if ($id) {
            // 同时添加缩略图
            $data = $request->only(['pics_url']);
            $data['goods_id'] = $id;

            $files = $request->file('pics_url');
            foreach ($files as $key => $value) {
                $res = $value->store('public/admin/pic');
                $res1 = substr($res, 6);
                $data['pics_url'] = 'storage'.$res1;

                DB::table('tp_goods_pics')->insert($data);
            };

            // 同时添加详情图
            $data = $request->only(['imgs_url']);
            $data['goods_id'] = $id;

            $files = $request->file('imgs_url');
            foreach ($files as $key => $value) {
                $res = $value->store('public/admin/img');
                $res1 = substr($res, 6);
                $data['imgs_url'] = 'storage'.$res1;
                DB::table('tp_goods_imgs')->insert($data);
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

        // 修改上下架
        $goods = tp_goods::find($id);
        $bool = $goods->goods_status;

        // 判断值后更改内容
        if ($bool) {
            $goods->goods_status = 0;
            $goods->save();
            return back()->with('success', '修改上下架成功');
        } else {
            $goods->goods_status = 1;
            $goods->save();
            return back()->with('success', '修改上下架成功');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $goods = tp_goods::find($id);
        $goodspic = tp_goods_pics::where('goods_id',$id)->get();
        $goodsimg = tp_goods_imgs::where('goods_id',$id)->get();

        // 加载修改视图
        return view('admin.goods.edit', ['cats' => self::getCats(), 'goods' => $goods, 'goodspic' => $goodspic, 'goodsimg' => $goodsimg]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(GoodsEditStoreBlogPost $request, $id)
    {
        // dd($id);
        $goods = tp_goods::find($id);
        $data = $request->except(['_token', '_method', 'pics_url', 'imgs_url', 'goods_plot']);

        // 判断封面图是否修改
        if (!$request->hasFile('goods_plot')) {
            // 没有修改封面图
            $bool = DB::table('tp_goods')->where('id', $id)->update($data);
        } else {
            // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
            $path = substr($goods->goods_plot, 8);

            // 删除旧图片
            Storage::delete("public/$path");

            // 重新更换新的图片
            $file = $request->file('goods_plot');// 创建文件上传对象
            $res = $file->store('public/admin/fm');

            // 将'public' 字符串替换成'storage'字符串
            $res1 = substr($res, 6);
            $data['goods_plot'] = 'storage'.$res1;

            $bool = DB::table('tp_goods')->where('id', $id)->update($data);
        }

        // 判断缩略图是否修改
        if ($request->hasFile('pics_url')) {
            $goodspic = tp_goods_pics::where('goods_id', $id)->get();
            foreach ($goodspic as $value) {
                // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
                $path = substr($value->pics_url, 8);

                // 删除旧图片
                Storage::delete("public/$path");
            }

            // 同时删除旧数据
            tp_goods_pics::where('goods_id', $id)->delete();

            // 同时添加缩略图进数据
            $data = $request->only(['pics_url']);
            $data['goods_id'] = $id;
            $files = $request->file('pics_url');
            foreach ($files as $key => $value) {
                $res = $value->store('public/admin/pic');
                $res1 = substr($res, 6);
                $data['pics_url'] = 'storage'.$res1;
                $bool = DB::table('tp_goods_pics')->insert($data);
            };
        }

        // 判断详情图是否修改
        if ($request->hasFile('imgs_url')) {
            $goodsimg = tp_goods_imgs::where('goods_id', $id)->get();
            foreach ($goodsimg as $value) {
                // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
                $path = substr($value->imgs_url, 8);

                // 删除旧图片
                Storage::delete("public/$path");
            }

            // 同时删除旧数据
            tp_goods_imgs::where('goods_id', $id)->delete();

            // 同时添加缩略图进数据
            $data = $request->only(['imgs_url']);
            $data['goods_id'] = $id;
            $files = $request->file('imgs_url');
            foreach ($files as $key => $value) {
                $res = $value->store('public/admin/img');
                $res1 = substr($res, 6);
                $data['imgs_url'] = 'storage'.$res1;
                $bool = DB::table('tp_goods_imgs')->insert($data);
            };
        }
        // 执行修改
        if ($bool) {
            return redirect('admin/goods')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
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

        // 执行删除操作
        DB::beginTransaction();
        $goods = tp_goods::find($id);
        $res1 = tp_goods::destroy($id);
        if ($res1) {
            // 同时删除封面图
            $path = substr($goods->goods_plot, 8);// 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
            Storage::delete("public/$path");
        }

        // 删除详情套图及数据
        $goodsimg = tp_goods_imgs::where('goods_id', $id)->get();
        $res2 = tp_goods_imgs::where('goods_id', $id)->delete();
        if ($res2) {
            foreach ($goodsimg as $value) {
                // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
                $path = substr($value->imgs_url, 8);

                // 删除旧图片
                Storage::delete("public/$path");
            }
        }

        // 删除缩略套图及数据
        $goodspic = tp_goods_pics::where('goods_id', $id)->get();
        $res3 = tp_goods_pics::where('goods_id', $id)->delete();
        if ($res3) {
            foreach ($goodspic as $value) {
                // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
                $path = substr($value->pics_url, 8);

                // 删除旧图片
                Storage::delete("public/$path");
            }
        }

        if($res1 && $res2 && $res3){
            DB::commit();
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            DB::rollBack();
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}

