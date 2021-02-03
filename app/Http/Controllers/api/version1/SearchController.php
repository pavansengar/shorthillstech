<?php
namespace App\Http\Controllers\api\version1;
use App\Http\Controllers\Controller;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     * @author Pavan Sengar
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;
        $event = Event::whereDate('start', '>=', $start)->whereDate('end','<=', $end)->get();
        return response()->json($event);
    }
}
