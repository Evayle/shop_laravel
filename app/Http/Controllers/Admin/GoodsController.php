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
use App\Model\Admin\tp_goods_attrs;
use App\Model\Admin\tp_goods_values;
use App\Model\Admin\tp_goods_skus;
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
        // 加载前台视图
        return view('admin.goods.index',['goods' => $goods, 'request' => $request->all()]);
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
            // 同时添加缩略图
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

            // 同时添加详情图
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
        $goods = tp_goods::find($id);
        $data = $request->except('_method','_token');

        // 判断封面图是否修改
        if (!$request->hasFile('goods_plot')) {
            $goods->goods_name = $request->input('goods_name', '');
            $goods->goods_keywords = $request->input('goods_keywords', '');
            $goods->goods_describe = $request->input('goods_describe', '');
            $goods->goods_categorys_id = $request->input('goods_categorys_idgoods_vip', '');
            $goods->goods_vip = $request->input('goods_vip', '');
            $goods->goods_discount = $request->input('goods_discount', '');
            $goods->goods_preferential = $request->input('goods_preferential', '');
            $goods->goods_fsp = $request->input('goods_fsp', '');
            $goods->goods_recommend = $request->input('goods_recommend', '');
            $goods->goods_categorys_id = $request->input('goods_categorys_id', '');
        } else {
            // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
            $path = substr($goods->goods_plot, 8);

            // 删除旧图片
            Storage::delete("public/$path");

            // 重新更换新的图片
            $file = $request->file('goods_plot');// 创建文件上传对象
            $res = $file->store('public');

            // 将'public' 字符串替换成'storage'字符串
            $res1 = substr($res, 6);
            $goods->goods_plot = 'storage'.$res1;
            $goods->goods_name = $request->input('goods_name', '');
            $goods->goods_keywords = $request->input('goods_keywords', '');
            $goods->goods_describe = $request->input('goods_describe', '');
            $goods->goods_categorys_id = $request->input('goods_categorys_idgoods_vip', '');
            $goods->goods_vip = $request->input('goods_vip', '');
            $goods->goods_discount = $request->input('goods_discount', '');
            $goods->goods_preferential = $request->input('goods_preferential', '');
            $goods->goods_fsp = $request->input('goods_fsp', '');
            $goods->goods_recommend = $request->input('goods_recommend', '');
            $goods->goods_categorys_id = $request->input('goods_categorys_id', '');
        }

        // 判断缩略图是否修改
        if ($request->hasFile('pics_url')) {
            $goodspic = tp_goods_pics::where('goods_id', $id)->get();
            // dd($goodspic);
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
                $res = $value->store('public');
                $res1 = substr($res, 6);
                $data['pics_url'] = 'storage'.$res1;
                $goods_pics = new tp_goods_pics;
                $goods_pics->pics_url = $data['pics_url'];
                $goods_pics->goods_id = $data['goods_id'];
                $goods_pics->save();
            };
        }

        // 判断详情图是否修改
        if ($request->hasFile('imgs_url')) {
            $goodsimg = tp_goods_imgs::where('goods_id', $id)->get();
            // dd($goodspic);
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
                $res = $value->store('public');
                $res1 = substr($res, 6);
                $data['imgs_url'] = 'storage'.$res1;
                $goods_imgs = new tp_goods_imgs;
                $goods_imgs->imgs_url = $data['imgs_url'];
                $goods_imgs->goods_id = $data['goods_id'];
                $goods_imgs->save();
            };
        }

        // 执行修改
        if ($goods->save()) {
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
        //
    }

    /**
     * 属性名添加页面
     * @return [type] [description]
     */
    public function attr($id)
    {
        // 判断是否有库存
        $data = tp_goods::where('goods_hot', '>', 0)->where('id', $id)->first();
        if ($data) {
            // 跳转到单品库存列表
            return redirect("admin/goods/info/{$id}")->with('success', '已设置规格, 可任意更改该商品的库存');
        }
        
        // 判断是否填写了属性名
        $data = tp_goods_attrs::where('goods_id', $id)->first();
        if (!empty($data)) {
            return redirect("admin/goods/value/{$id}")->with('success', '已设置属性名, 且暂无库存, 可任意更改属性值');
        }
        
        return view('admin.goods.attr', ['goods_id' => $id]);
    }

    /**
     * 属性名执行添加
     * @return [type] [description]
     */
    public function attrStore(Request $request)
    {
        $data = $request->except('_token');

        // 获取分类id
        $goods_categorys_id = tp_goods::where('id', $data['goods_id'])->first()->goods_categorys_id;

        // 获取商品id
        $goods_id = $data['goods_id'];

        // 去除$data中的goods_id值
        unset($data['goods_id']);
        
        // 遍历写入属性名表
        foreach ($data as $k => $v) {
            foreach ($v as $kk => $vv) {
                if (!empty($vv)) {
                    $attr = new tp_goods_attrs;
                    $attr->goods_categorys_id = $goods_categorys_id;
                    $attr->goods_id = $goods_id;
                    $attr->attrs_name = $vv;
                    // dump($attr);
                    $bool = $attr->save();
                }
            }
        }
        if ($bool) {
            return redirect("admin/goods/value/{$goods_id}")->with('success', '属性名添加成功');
        } else {
            return back()->with('error', '属性名添加失败');
        }
    }

    /**
     * 属性值添加页面
     * @return [type] [description]
     */
    public function value($id)
    {
        return view('admin.goods.value', ['goods_id' => $id]);
    }

    /**
     * 属性值执行添加
     * @return [type] [description]
     */
    public function valueStore(Request $request)
    {
        // 判断是否重写属性值
        $data = tp_goods_values::where('goods_id', $request->input('goods_id'))->first();
        if ($data) {
            tp_goods_values::where('goods_id', $request->input('goods_id'))->delete();
        }

        $data = $request->except('_token');

        // 获取商品id
        $goods_id = $data['goods_id'];

        // 根据商品id获取对应的两个属性名id
        $ysid = tp_goods_attrs::where('goods_id', $goods_id)->where('attrs_name', '颜色')->first()->id;
        $ccid = tp_goods_attrs::where('goods_id', $goods_id)->where('attrs_name', '尺寸')->first()->id;

        // 获取颜色属性值
        $ys = $data['ys'];

        // 获取尺寸属性值
        $cc = $data['cc'];
        
        // 遍历将颜色属性写入属性值表
        foreach ($ys as $k => $v) {
            if (!empty($v)) {
                $value = new tp_goods_values;
                $value->goods_attrs_id = $ysid;
                $value->goods_id = $goods_id;
                $value->values_name = $v;
                // dump($value);
                $bool = $value->save();
            }
        }

        // 遍历将尺寸属性写入属性值表
        foreach ($cc as $k => $v) {
            if (!empty($v)) {
                $value = new tp_goods_values;
                $value->goods_attrs_id = $ccid;
                $value->goods_id = $goods_id;
                $value->values_name = $v;
                // dump($value);
                $bool = $value->save();
            }
        }

        if ($bool) {
            // 判断是否重写规格表
            $data = tp_goods_skus::where('goods_id', $goods_id)->first();
            if ($data) {
                tp_goods_skus::where('goods_id', $goods_id)->delete();
            }

            // 再将属性名跟属性值填入规格表
            $goods_categorys_id = tp_goods::where('id', $goods_id)->first()->goods_categorys_id;// 获取分类id

            // 获取颜色属性值, 并且拼接成id,id 字符串
            $ysv = tp_goods_values::where('goods_attrs_id', $ysid)->get();
            foreach ($ysv as $k => $v) {
                $ysarr[] = $v->id;
            }
            $ysstr = join($ysarr, ',');

            $sku = new tp_goods_skus;
            $sku->goods_id = $goods_id;
            $sku->goods_categorys_id = $goods_categorys_id;
            $sku->goods_attrs_id = $ysid;
            $sku->goods_values_id = $ysstr;
            $sku->save();

            // 获取尺寸属性值, 并且拼接成id,id 字符串
            $ccv = tp_goods_values::where('goods_attrs_id', $ccid)->get();
            foreach ($ccv as $k => $v) {
                $ccarr[] = $v->id;
            }
            $ccstr = join($ccarr, ',');

            $sku = new tp_goods_skus;
            $sku->goods_id = $goods_id;
            $sku->goods_categorys_id = $goods_categorys_id;
            $sku->goods_attrs_id = $ccid;
            $sku->goods_values_id = $ccstr;
            $sku->save();
            return redirect("admin/goods/info/{$goods_id}")->with('success', '属性名添加成功');
        } else {
            return back()->with('error', '属性名添加失败');
        }
    }

    /**
     * 单品库存页面
     * @return [type] [description]
     */
    public function info($id)
    {
        return view('admin.goods.info', ['goods_id' => $id]);
    }
}
