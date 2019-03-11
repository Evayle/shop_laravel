<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\FsStoreBlogPost;
use App\Model\Admin\tp_friendship;
use DB;
use Illuminate\Support\Facades\Storage;

/**
 * 这是友情链接的控制器
 */

class friendshipController extends Controller
{
    /**
     * Display a listing of the resource.
<<<<<<< HEAD
     *
=======
     * 友情链接列表
>>>>>>> origin/xujw
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        /*if(file_exists('../storage/app/public/1552233414775.jpeg')){
            unlink('../storage/app/public/1552233414775.jpeg');
        }else{
            dd('no');
        }
        exit;*/

        // $list = $request->all();
        $tp_fs = new tp_friendship;
        $count = $request->input('count',5);
        $search = $request->input('search','');
        $data = $tp_fs::where('fs_name','like','%'.$search.'%')->paginate($count);
        $i = 1;
        return view('admin/friendship/index',['data' => $data,'i' => $i,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
<<<<<<< HEAD
     *
=======
     * 友情链接添加页面
>>>>>>> origin/xujw
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/friendship/create');
    }

    /**
     * Store a newly created resource in storage.

     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     /* 友情链接添加操作
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FsStoreBlogPost $request)
    {
        //
        $data = $request->except('_token');

        //获取文件对象
        $file = $request->file('fs_logo');

        if ($file == true) {
            // 获取文件后缀
            $ext = $file->extension();
            // 拼接文件名
            $logo_name = time().rand(100,999).'.'.$ext;
            // 执行文件上传
            $res = $file->storeAs('public',$logo_name);
            if ($res == false) {
                return back()->with('图片添加失败');
            }
        }else{
            // 未选择则默认logo图片
            $logo_name = time().rand(100,999).'.jpg';
        }


        // 执行写入数据库
        $tp_fs = new tp_friendship;
        $tp_fs->fs_name = $data['fs_name'];// 链接名称
        $tp_fs->fs_link = $data['fs_link'];// 链接网址
        $tp_fs->fs_note = $data['fs_note'];// 公司名字
        $tp_fs->fs_logo = $logo_name;// logo名字
        $tp_fs->fs_status = 0;// 是否启用 默认0启用
        $bool = $tp_fs->save();// 写入
        if ($bool == true) {
            return redirect('admin/friendship')->with('success','添加成功');
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
        //
        echo "show";
    }

    /**
     * Show the form for editing the specified resource.
<<<<<<< HEAD
     *
=======
     * 友情链接修改页面
>>>>>>> origin/xujw
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tp_fs = new tp_friendship;
        $data = $tp_fs->find($id);
        // dd($data);
        // echo $data['fs_logo'];
        return view('admin/friendship/edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
<<<<<<< HEAD
     *
=======
     * 友情链接修改操作
>>>>>>> origin/xujw
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /*// 这是验证是否选择图片的  不需要了
        $this->validate($request, ['fs_logo'=>'required'], ['fs_logo.required'=>'请选择图片']);*/
        $data = new tp_friendship;
        $upd = $data->find($id);
        $old_pic = $upd->fs_logo;
        $file = $request->file('fs_logo');
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
            $upd->fs_logo = $logo_name;
        }
        $upd->fs_name = $request->input('fs_name','');
        $upd->fs_link = $request->input('fs_link','');
        $upd->fs_note = $request->input('fs_note','');
        $bool = $upd->save();
        if ($bool == true) {
            return redirect('admin/friendship')->with('success','修改成功');
        }else{
            return redirect('admin/friendship')->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
<<<<<<< HEAD
     *
=======
     * 友情链接删除操作
>>>>>>> origin/xujw
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $tp_fs = new tp_friendship;
        $old_data = $tp_fs->find($id);
        // 获取要删除的文件名
        $old_pic = $old_data->fs_logo;
        $res = $tp_fs::destroy($id);
        // dd($res);
        if ($res) {
            unlink('../storage/app/public/'.$old_pic);

            return redirect($_SERVER['HTTP_REFERER'])->with('success','删除成功');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('error','删除失败');
        }
    }
}
