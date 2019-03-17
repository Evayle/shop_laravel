<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home.evaluation.index');
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

        DB::beginTransaction();
        $request->all();
        $user_comment['uphon'] = Session('user_login')[1];//用户手机号
        $user_comment['user_like'] =$request->user_like;//用户的评价
        $user_comment['user_comment'] =$request->user_comment;//用户给的评价内容
        $user_comment['gid'] = 5;//商品id
        $date = DB::table('user_comment')->insert($user_comment);

        //检测文件是否有上传
         if ($request->hasFile('good_img'))
        {
            $file = $request->file('good_img');//创建文件上传对象
            //设置文件路径
            $path_file = 'public/home/comment';
            foreach ($file as $key => $value) {
                //获取文件后缀
                $ext = $value->extension();
                $images = array("jpg","jpeg","gif","png");
                if (in_array($ext, $images))
                  {
                    //上传指定文件
                    $res = $value->store($path_file);
                    $res1 = substr($res, 6);
                    $user_img['good_img'] = 'storage'.$res1;
                    $user_img['gid'] = $user_comment['gid'];
                    $data = DB::table('user_comment_img')->insert($user_img);
                  }else{
                    DB::rollBack();//执行回滚,另一个对对应的表删除
                    return back();
                  }
                  if ($date && $data == true) {
                      DB::commit();
                      return 1;
                  }



            }

        }


        // 检查是否有文件上传-
        // if ($request->hasFile('good_img')) {
        //     $file = $request->file('good_img');// 创建文件上传对象
        //     // 执行文件上传
        //     foreach ($file as $key => $value) {
        //         $res = $value->store('public/home/comment');
        //         $ext = $file->extension();
        //         dump($ext);exit;
        //         $res1 = substr($res, 6);
        //         $data['pics_url'] = 'storage'.$res1;

        //         DB::table('tp_goods_pics')->insert($data);
        //     };

        //     // 将'public'替换成'storage'
        //     $res1 = substr($res, 6);
        //     $data['goods_plot'] = 'storage'.$res1;
        // }else{
        //     echo 132;
        // }





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
