@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mt-5"
    >{{ isset($plan) ? 'Edit Plan' : 'Create Plan' }}</h1>

    <form action="{{ isset($plan) ? route('plans.update', $plan->id) : route('plans.store') }}" method="POST">
        @csrf
        @if(isset($plan))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $plan->name ?? old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $plan->slug ?? old('slug') }}" required>
        </div>

        <div class="form-group">
            <label for="stripe_plan">Stripe Price ID</label>
            <input type="text" name="stripe_plan" id="stripe_plan" class="form-control" value="{{ $plan->stripe_plan ?? old('stripe_plan') }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $plan->price ?? old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $plan->description ?? old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="duration">Duration</label>
            <select name="duration" id="duration" class="form-control" required>
                <option value="mon" {{ (isset($plan) && $plan->duration == 'mon') ? 'selected' : '' }}>Mon</option>
                <option value="yr" {{ (isset($plan) && $plan->duration == 'yr') ? 'selected' : '' }}>Yr</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">{{ isset($plan) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection

