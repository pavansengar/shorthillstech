<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use THelpers;

class AuthKey
{
    /**
     * Handle an incoming request.
     * @author Pavan Sengar
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('x-api-key');
        $is_validate = THelpers::tokenValidate('search',$token);
        if($is_validate == false){
            return response()->json(['message'=> 'App Key not found!'], 401);
        }
        return $next($request);
    }
}
