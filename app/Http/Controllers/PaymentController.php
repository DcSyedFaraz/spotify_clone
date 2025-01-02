<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Plan;
use Log;
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
        $plans = Plan::get();

        $user = Auth::user();
        if (!$user) {
            abort(403, 'User not authenticated.');
        }

        $intent = auth()->user()->createSetupIntent();

        return view('frontend.subscription', compact('plans', 'intent'));
    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function show(Plan $plan, Request $request)
    {
        // dd($plan);

        // Check if user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed.');
        }

        // Create Setup Intent
        $intent = auth()->user()->createSetupIntent();

        return view("frontend.subscription", compact("plan", "intent"));
    }



    /**

     * Write code on Method

     *

     * @return response()

     */
    public function subscription(Request $request)
    {

        $plan = Plan::find($request->plan);

        try {
            $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)
                ->create($request->token);

            return redirect()->route('subscription.index', $plan->slug)
                ->with('success', 'Subscription purchased successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that may occur during subscription creation
            return redirect()->route('subscription', $plan->slug)
                ->with('error', 'There was an issue with your subscription.');
        }
    }
}
