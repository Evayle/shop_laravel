<?php

namespace App\Http\Middleware;

use Closure;

class RbacMiddleware
{
    /**
 * @return array
 * 获取控制器和方法名
 */
    public static function getControllerAndFunction()
    {
        $action = \Route::current()->getActionName();
        list($class, $method) = explode('@', $action);
        $class = substr(strrchr($class,'\\'),1);
        return ['controller' => $class, 'method' => $method];
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $admin_node = session('admin_node_type');
       // dump($admin_node);
        //获取用户可以访问的控制器
        $keys = array_keys($admin_node);
        // dump($keys);

        $cname_aname = self::getControllerAndFunction();
        $cname = strtolower($cname_aname['controller']);
        $aname = strtolower($cname_aname['method']);
       // dump($cname);
        //查看权限
        // if(!in_array($cname,$keys)){
        //     dd('没有权限');
        // }
        // if(!in_array($aname,$admin_node[$cname])){
        //     dd('没有的权限啊');
        // }

        return $next($request);
    }
}
