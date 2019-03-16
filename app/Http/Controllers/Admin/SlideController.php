<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\tp_slide;

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
        //
        $slide = new tp_slide;
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $data = $slide::where('slide_name','like','%'.$search.'%')->paginate($count);
        $i = 0;
        $j = 0;
        return view('admin.slide.index',['data'=>$data,'i'=>$i,'j'=>$j,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
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
        $file = $request->file('slide_pic');
        // 检测是否获取到上传文件
        if ($file == true) {
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接文件名
            $file_name = time().rand(100,999).'.'.$ext;
            // 执行文件上传
            $res = $file->storeAs('public',$file_name);
            if ($res == false) {
                return back()->with('error','图片添加失败');
            }
        }else{
            return back()->with('error','请添加图片');
        }

        // 执行写入数据库操作
        $slide = new tp_slide;
        $data = $request->except('_token');
        // dd($data);
        $slide->slide_name = $data['slide_name'];// 名字
        $slide->slide_note = $data['slide_note'];// 图片详细描述
        $slide->slide_pic = $file_name;// 图片名字
        $slide->slide_status = 1;// 默认不显示图片
        $bool = $slide->save();// 写入
        if ($bool == true) {
            return redirect('admin/slide')->with('success','添加成功');
        }else{
            unlink('../stroage/app/public'.$file_name);
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
        $tp_fs = new tp_slide;
        $data = $tp_fs->find($id);
        // dd($data);
        // echo $data['fs_logo'];
        return view('admin/slide/edit', ['data'=>$data]);
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
        // 这是验证是否选择图片的  不需要了 
        $this->validate($request, ['slide_note'=>'required'], ['slide_note.required'=>'请填写内容']);
        $data = new tp_slide;
        $upd = $data->find($id);
        $old_pic = $upd->slide_pic;
        $file = $request->file('slide_pic');
        if ($file == true) {
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接文件名
            $logo_name = time().rand(100,999).'.'.$ext;
            // 执行文件上传
            $res = $file->storeAs('public',$logo_name);
            if ($res == false) {
                return back()->with('error','图片添加失败');
            }else{
                if (file_exists('../storage/app/public/'.$old_pic)) {
                    unlink('../storage/app/public/'.$old_pic);
                }
            }
            $upd->slide_pic = $logo_name;
        }
        $upd->slide_name = $request->input('slide_name','');
        $upd->slide_note = $request->input('slide_note','');
        
        $bool = $upd->save();
        if ($bool == true) {
            return redirect('admin/slide')->with('success','修改成功');
        }else{
            return redirect('admin/slide')->with('error','修改失败');
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
        $old_pic = $data->slide_pic;
        // dd($old_pic);
        $res = $tp_fs::destroy($id);
        // dd($res);
        if ($res) {
            if (file_exists('../storage/app/public/'.$old_pic)) {
                unlink('../storage/app/public/'.$old_pic);
            }
            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
