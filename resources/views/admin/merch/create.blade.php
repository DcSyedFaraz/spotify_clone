@extends('layout.app')

@section('content')
    <div class="container">
        <h2>{{ isset($merchItem) ? 'Edit' : 'Create' }} Merch Item</h2>
        <form action="{{ isset($merchItem) ? route('admin.merch.update', $merchItem) : route('admin.merch.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($merchItem))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="user_id" class="form-label">Admin</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Merch Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $merchItem->name ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="descriptions" name="description">{{ old('description', $merchItem->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price"
                    value="{{ old('price', $merchItem->price ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" class="form-control" id="images" accept="image/*" name="images[]" multiple>

                @if (isset($merchItem) && $merchItem->images->count() > 0)
                    <div class="mt-2">
                        <h5>Existing Images:</h5>
                        @foreach ($merchItem->images as $image)
                            <img src="{{ asset("storage/{$image->image_path}") }}" class="img-thumbnail" width="100"
                                height="100" alt="Merch Image">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Printify Product Toggle Switch -->
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="printifyToggle" name="is_printify_product"
                    value="1"
                    {{ old('is_printify_product', isset($merchItem) ? (!empty($merchItem->printify_product_id) ? 'checked' : '') : '') }}>
                <label class="form-check-label" for="printifyToggle">Printify Product</label>
            </div>

            <!-- Printify Product ID Input (conditionally shown) -->
            <div class="mb-3" id="printifyProductIdContainer" style="display: none; transition: opacity 0.3s ease;">
                <label for="printify_product_id" class="form-label">Printify Product ID</label>
                <input type="text" class="form-control" id="printify_product_id" name="printify_product_id"
                    value="{{ old('printify_product_id', $merchItem->printify_product_id ?? '') }}"
                    placeholder="Enter Printify Product ID">
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($merchItem) ? 'Update' : 'Create' }}</button>
        </form>
    </div>

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggle = document.getElementById('printifyToggle');
            const container = document.getElementById('printifyProductIdContainer');

            function updatePrintifyFieldVisibility() {
                console.log('Toggle checked:', toggle.checked);

                if (toggle.checked) {
                    container.style.display = 'block';
                    container.style.opacity = 1;
                } else {
                    // Fade out effect before hiding
                    container.style.opacity = 0;
                    setTimeout(() => {
                        container.style.display = 'none';
                    }, 300);
                }
            }

            // Initialize visibility on page load based on toggle state
            updatePrintifyFieldVisibility();

            // Listen for toggle changes
            toggle.addEventListener('change', updatePrintifyFieldVisibility);
        });
    </script>
@endsection
@endsection
