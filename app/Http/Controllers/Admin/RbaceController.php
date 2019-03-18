<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class RbaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $i =1;
        $date=DB::table('rbac_rolse')->get();//用户权限
        $data=DB::table('rbac_user_node')->get();//权限节点
        return view('admin.rbac.index',['date'=>$date,'i'=>$i,'node_user'=>$data
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.rbac.user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->except(['_token']);
        $date = DB::table('rbac_rolse')->insert($res);
        if ($date) {
            return redirect('/admin/rbace')->with('success',"添加成功");
        }else{
            return back()->with('error',"添加失败");
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

    public function nodeadd()
    {
        //添加节点
        return view('admin.rbac.nodeadd');

    }

    public function insert(Request $request)
    {
       $res = $request->except(['_token']);
       if($res['cname'] !=$res['cname'].'controller'){
            $res['cname'] =$res['cname'].'controller';
       }

        $date = DB::table('rbac_user_node')->insert($res);

       if ($date) {

            return redirect('/admin/rbace')->with('success',"添加成功");
        }else{
            return back()->with('error',"添加失败");
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
        //获取当前角色
        $role = DB::table('rbac_rolse')->where('id',$id)->first();
        //获取所有的权限节点表
        $nodes = DB::table('rbac_user_node')->get();

        //获取当前角色的当爱节点ID
        $role_data = DB::table('rbac_rid_nid')->where('rid',$id)->select('nid')->get();
        $role_date = [];
        foreach ($role_data as $key => $value) {
            $role_date[] = $value->nid;
        }




        return view('admin.rbac.edit',['role'=>$role,'nodes'=>$nodes,'role_date'=>$role_date]);
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
        //接收条件
        $nids = $request->input('nids');

        //删除旧的数据
        $date = DB::table('rbac_rid_nid')->where('rid',$id)->delete();

        foreach ($nids as $key => $nid) {
           $tmp=[
            'rid'=>$id,
             'nid'=>$nid,
           ];
           DB::table('rbac_rid_nid')->insert($tmp);
        }
        return back()->with('success','添加成功');
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

    public function updatenode()
    {

    }





}
