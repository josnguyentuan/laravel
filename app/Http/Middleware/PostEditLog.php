<?php

namespace App\Http\Middleware;

use App\Post;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostEditLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
////        dd(Auth::user()->id);
////        dd(Carbon::now()->format('d-m-Y H:i:s'));
//        Log::info('Edit Post: id = ' . $request->id
//            . "-user:" . Auth::id());
//        DB::table('post_history')->insert([
//           'id'=> $request->id,
//           'title'=> $request->title,
//           'short_description'=>$request->short_description,
//            'cate_id'=>$request->cate_id,
//            'created_at' => Carbon::now(),
//            'updated_by' => Auth::id(),
//        ]);
//        $obj = Post::find($request->id);
//        if ($obj->created_by != Auth::id()){
//            return  redirect()->back()->with('msg', "Dont permission change");
//        }
        return $next($request);
    }
}
