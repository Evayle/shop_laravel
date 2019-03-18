<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\tp_slide;
use App\Model\Admin\tp_goods;
use App\Http\Requests\SlidesStoreBlogPost;
use App\Http\Requests\SlidesEditStoreBlogPost;
use DB;
use Storage;

/**
 * 这是后台轮播图管理的控制器
 */
class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     * 这是轮播图图片列表
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 显示出对应商品的名称
        $goods = new tp_goods;

        // 搜索
        $search = $request->input('search');
        $slides = DB::table('tp_slides')->where('slide_name', 'like', '%'.$search.'%')->paginate(10);        
        return view('admin.slide.index',['slides' => $slides,'request'=>$request->all(), 'goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 查找出所有商品
        $goods = DB::table('tp_goods')->where('goods_status', 1)->get();
        return view('admin.slide.create', ['goods' => $goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlidesStoreBlogPost $request)
    {
        $data = $request->except(['_token', 'slide_pic']);

        // 检查是否有文件上传
        if ($request->hasFile('slide_pic')) {
            $file = $request->file('slide_pic');// 创建文件上传对象
            // 执行文件上传
            $res = $file->store('public/admin/slide');

            // 将'public'替换成'storage'
            $res1 = substr($res, 6);
            $data['slide_pic'] = 'storage'.$res1;
        }else{
            return back();
        }

        $bool = DB::table('tp_slides')->insert($data);
        
        if ($bool == true) {
            return redirect('admin/slide')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        // 修改状态
        $slides = tp_slide::find($id);
        $bool = $slides->slide_status;

        // 判断值后更改内容
        if ($bool) {
            $slides->slide_status = 0;
            $slides->save();
            return back()->with('success', '修改状态成功');
        } else {
            $slides->slide_status = 1;
            $slides->save();
            return back()->with('success', '修改状态成功');
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
        // 查找出所有商品
        $goods = DB::table('tp_goods')->where('goods_status', 1)->get();

        $tp_fs = new tp_slide;
        $data = $tp_fs->find($id);
        // dd($data);
        // echo $data['fs_logo'];
        return view('admin/slide/edit', ['data'=>$data, 'id' => $id, 'goods' => $goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlidesEditStoreBlogPost $request, $id)
    {
        $slide = tp_slide::find($id);
        $data = $request->except(['_token', '_method', 'slide_pic']);

        // 判断封面图是否修改
        if (!$request->hasFile('slide_pic')) {
            // 没有修改封面图
            $bool = DB::table('tp_slides')->where('id', $id)->update($data);
        } else {
            // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
            $path = substr($slide->slide_pic, 8);

            // 删除旧图片
            Storage::delete("public/$path");

            // 重新更换新的图片
            $file = $request->file('slide_pic');// 创建文件上传对象
            $res = $file->store('public/admin/slide');

            // 将'public' 字符串替换成'storage'字符串
            $res1 = substr($res, 6);
            $data['slide_pic'] = 'storage'.$res1;

            $bool = DB::table('tp_slides')->where('id', $id)->update($data);
        }

        if ($bool == true) {
            return redirect('admin/slide')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $tp_fs = new tp_slide;
        $data = $tp_fs->find($id);
        if (!empty($data)) {
            // 将 '/storage/xxxx.jpg' 更换成 'xxxx.jpg'
            $path = substr($data->slide_pic, 8);

            // 删除旧图片
            Storage::delete("public/$path");
            $old_pic = $data->slide_pic;
            $res = $tp_fs::destroy($id);
            if ($res) {
                return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
            }else{
                return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
            }
        } else {
            return back();
        }
    }
}
