<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Str;
use Session;
class CouponController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:coupon_show|coupon_create|coupon_edit|coupon_delete', ['only' => ['index','show']]);
         $this->middleware('permission:coupon_add', ['only' => ['create','store']]);
         $this->middleware('permission:coupon_edit', ['only' => ['edit','update']]);
         $this->middleware('permission:coupon_delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Section::with('categories')->get();
        $users = User::all();
        return view('backend.coupons.manage',compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($data['coupon_option'] == 'automatic'){
            $data['coupon_code'] = Str::random(8);
        }
        $data['categories'] = json_encode($request->categories) ?? '';
        $data['users'] = json_encode($request->users) ?? '';
        Coupon::create($data);

        return redirect()->route('backend.coupon.index')
                ->with('msg', __('app.crud.added',['attribute'=>'Coupon']));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $categories = Section::with('categories')->get();
        $users = User::all();
        return view('backend.coupons.manage',compact('coupon','categories','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $data = $request->all();

        if($data['coupon_option'] == 'automatic'){
            $data['coupon_code'] = Str::random(8);
        }
        $data['categories'] = json_encode($request->categories) ?? '';
        $data['users'] = json_encode($request->users) ?? '';
        $coupon->update($data);

        return redirect()->route('backend.coupon.index')
            ->with('msg', __('app.crud.updated',['attribute'=>'Coupon']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('backend.coupon.index')
            ->with('msg', __('app.crud.deleted',['attribute'=>'Coupon']));
    }

    public function status(Request $request){
        $coupon = Coupon::find($request->id);
        $coupon->status = $request->status;
        $coupon->save();
        return \Response::json(['status'=>true, 'msg'=>"__('app.status')"], 200);
    }

}
