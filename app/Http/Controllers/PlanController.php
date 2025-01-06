<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Log;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:plans',
            'stripe_plan' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'duration' => 'required|in:mon,yr',
        ]);

        Plan::create($request->all());

        return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
    }

    public function show(Plan $plan)
    {
        return '$plan->id';
    }


    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.create', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        // dd($request->all(), $plan->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => "required|string|max:255|unique:plans,slug,{$plan->id}",
            'stripe_plan' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'duration' => 'required|in:mon,yr',
        ]);

        $plan->update($request->all());

        return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
    }
}
