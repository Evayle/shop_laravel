<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\tp_goods_categorys;

use App\Http\Requests\CategoryStoreBlogPost;
use DB;

class CategoryController extends Controller
{
    /**
     * 获取分类排版
     * @return [type] [description]
     */
    public function getCats()
    {
        // $cats = tp_goods_categorys::all();
        // $cats = DB::select("select *,concat(categorys_path,',',id) as paths from tp_goods_categorys order by paths");
        $cats = tp_goods_categorys::select('*',DB::raw("concat(categorys_path,',',id) as paths"))->orderBy('paths','asc')->get();

        // 拼接上分类排版
        foreach ($cats as $key => $value) {
            // 统计path中 ,出现次数
            $n = substr_count($value->categorys_path, ',');

            // 重复使用一个字符串
            $cats[$key]->categorys_name = str_repeat('|----',$n).$value->categorys_name;
        }

        return $cats;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收关键词参数
        $search = $request->input('search','');
        $cats = tp_goods_categorys::where('categorys_name', 'like', '%'.$search.'%')->select('*',DB::raw("concat(categorys_path,',',id) as paths"))->orderBy('paths','asc')->paginate(10);


        // 拼接上分类排版
        foreach ($cats as $key => $value) {
            // 统计path中 ,出现次数
            $n = substr_count($value->categorys_path, ',');

            // 重复使用一个字符串
            $cats[$key]->categorys_name = str_repeat('|----',$n).$value->categorys_name;
        }

        // 加载添加分类视图
        return view('admin.category.index',['categorys' => $cats, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        // 加载添加分类视图
        return view('admin.category.create', ['id' => $id, 'cats' => self::getCats()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreBlogPost $request)
    {
        //接收 分类添加 传值
        $data = $request->all();

        // 处理 分类路径
        if ($data['categorys_pid'] == 0) {
            $data['categorys_path'] = 0;
        } else {
            // 获取分类父级的信息
            $parent_data = tp_goods_categorys::find($data['categorys_pid']);

            // 获取分级分类的path,id(父级path + , + id = 子级path)
            $data['categorys_path'] = $parent_data->categorys_path.','.$parent_data->id;
        }

        $category = new tp_goods_categorys;
        $category->categorys_name = $data['categorys_name'];
        $category->categorys_pid = $data['categorys_pid'];
        $category->categorys_path = $data['categorys_path'];

        // 执行添加
        if ($category->save()) {
            return redirect('admin/category')->with('success', '添加成功');
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
        // 修改热门分类
        $goods = tp_goods_categorys::find($id);
        $bool = $goods->categorys_hot;

        // 判断值后更改内容
        if ($bool) {
            $goods->categorys_hot = 0;
            $goods->save();
            return back()->with('success', '修改热门分类成功');
        } else {
            $goods->categorys_hot = 1;
            $goods->save();
            return back()->with('success', '修改热门分类成功');
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
        // 修改显示
        $goods = tp_goods_categorys::find($id);
        $bool = $goods->categorys_display;

        // 判断值后更改内容
        if ($bool) {
            $goods->categorys_display = 0;
            $goods->save();
            return back()->with('success', '修改显示成功');
        } else {
            $goods->categorys_display = 1;
            $goods->save();
            return back()->with('success', '修改显示成功');
        }
    }
}
