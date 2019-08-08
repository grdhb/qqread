<?php

namespace App\Http\Controllers\Admin\index;
use App\Model\fiction;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * 后台首页
     */
    public function index()
    {

        return view('admin.index.index');
    }
    /**
     * 小说添加
     */
    public function fictions ()
    {
        return view('admin.index.fiction');
    }

    /**
     * 添加执行
     */
    public function fictionsdo(Request $request)
    {
       $post=$request->all();
        //图片上传
        if($request->hasFile('file')) {
            $post['file'] = $this->updates($request, 'file');
        }
        $post['created_at']=date("Y-m-d h:i:s", time());
        $res=DB::table('fiction')->insert($post);
        if($res){
           echo"<script>alert('添加成功');location.href='/admin/fictions'</script>";
        }
    }
    /**
     * 轮播图
     */
    public function slideshow()
    {
        return view('admin.index.slideshow');
    }
    /**
     * 添加轮播图执行
     */
    public function slideshowdo(Request $request)
    {
        $post=$request->all();
        //图片上传
        if($request->hasFile('file')) {
            $post['file'] = $this->updates($request, 'file');
        }
        $post['created_at']=date("Y-m-d h:i:s", time());
        $res=DB::table('slideshow')->insert($post);
        if($res){
            echo"<script>alert('添加成功');location.href='/admin/slideshow'</script>";
        }
    }
    /**
     * 轮播图列表
     */
    public function slideshowlist()
    {
        $slideshow=DB::table('slideshow')->get();
        return view('admin.index.slideshowlist',compact('slideshow'));
    }
    /**
     * 修改轮播图状态已启用
     */
    public function show(Request $request)
    {
        $id=$request->id;
        $where=[
            'id'=>$id
        ];
        $res=DB::table('slideshow')->where($where)->update(['show'=>1]);
    }
    /**
     * 修改轮播图状态未启用
     */
    public function shows(Request $request)
    {
        $id=$request->id;
        $where=[
            'id'=>$id
        ];
        $res=DB::table('slideshow')->where($where)->update(['show'=>0]);
    }
    /**
     * 文件上传
     * @param Request $request
     * @param $file
     * @return false|string
     */
    public function updates(Request $request,$file){
        if($request->file($file)->isValid()){
            $photo = $request->file($file);
            $extension = $photo->extension();
            $store_result = $photo->storeAs(date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension);
            return $store_result;
        }else{
            exit('文件上传出错');
        }
    }


    //添加作品
    public function production(){
        return view('admin.index.production');
    }
    //添加作品执行
    public function productiondo(Request $request){
        $post=$request->all();
        dd($post);
    }
}
