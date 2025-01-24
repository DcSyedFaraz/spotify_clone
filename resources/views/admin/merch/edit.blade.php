@extends('layout.app')
@section('title', 'Edit Merch Item')
@section('content')
    <div class="container">
        <h2>Edit Merch Item</h2>
        <form action="{{ route('admin.merch.update', $merchItem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="descriptions" name="description">{{ $merchItem->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $merchItem->price }}">
            </div>
            <div class="mb-3">
                <label for="images" class="form-label">Add More Images</label>
                <input type="file" class="form-control" id="images" name="images[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
