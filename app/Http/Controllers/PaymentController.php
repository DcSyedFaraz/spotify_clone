<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use response;

class PaymentController extends Controller
{
    /**

     * Write code on Method

     *

     * @return response()

     */
    public function index()
    {
        $plans = Plan::all();
        return view('frontend.subscription', compact('plans'));  
    }

    /**

     * Write code on Method

     *

     * @return response()

     */

     public function show(Plan $plan, Request $request)
     {
         // Check if user is authenticated
         if (!auth()->check()) {
             return redirect()->route('login')->with('error', 'Please login to proceed.');
         }

         // Create Setup Intent
         $intent = auth()->user()->createSetupIntent();

         return view("frontend.subscription_show", compact("plan", "intent"));
     }

    /**

     * Write code on Method

     *

     * @return response()

     */
    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
       $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                        ->create($request->token);
        return view("frontend.subscription_success", compact("plan", "subscription"));
    }
}
