<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 

use App\Models\Coupon; 
use App\Models\CouponUser; 
use Carbon\Carbon;
use Illuminate\Http\Request;
class CouponController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->validate([
            'coupon_code' => 'required',
            'sub_total' => 'required',
        ]);
        $sub_total = $data['sub_total'];

        $coupon = Coupon::query()->where('coupon_code',$data['coupon_code'])->first();
        if($coupon) {
            $current_dttm = Carbon::now();
            if (strtotime($coupon->expiry_date) >= strtotime($current_dttm->toDateTimeString())) {
                if ($sub_total >= $coupon->amount) {
                    if ($coupon->use_limit > 0) {
                        $coupon_user = CouponUser::query()->where(['coupon_id' => $coupon->id , 'user_id' => auth()->id()])->count();

                        if($coupon_user < $coupon->use_limit){
                            if ($coupon->amount_type== 'flat') {
                                $coupon_amt =  $sub_total - $coupon->amount;
                            } else {
                                $coupon_amt =  $sub_total * $coupon->amount/ 100;
                            }
                            $coupon['coupon_amount'] = $coupon_amt;
                            $coupon['coupon_name'] = $coupon->code;
                            session()->put('coupon' , $coupon);

                            return js_response(null, "Coupon Applied Successfully");
                        }else{
                            return  js_response(null, "You have use this coupon limit.", false);
                        }
                    } 
                } 
                return js_response(null, "Cart Amount should be more than $coupon->value to apply  Coupon Code.", false);
            }
            
            return js_response(null, 'Your Coupon Code is Expired', false);
            
        }
        return js_response(null, 'Please Enter valid Coupon Code', false);

    }

    public function destory(){
        session()->forget('coupon');
    }
}