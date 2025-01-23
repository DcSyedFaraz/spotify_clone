<!-- resources/views/artist/events/create.blade.php -->

@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Add New Event</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('artist.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Event Image</label>
                <input type="file" class="form-control" id="image" name="image"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml">

            </div>
            <!-- Event Date -->
            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date & Time</label>
                <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
            </div>

            <!-- Ticket Link -->
            <div class="mb-3">
                <label for="ticket_link" class="form-label">Ticket Purchase Link (optional)</label>
                <input type="url" class="form-control" id="ticket_link" name="ticket_link">
            </div>

            <!-- Promotional Details -->
            <div class="mb-3">
                <label for="promotional_details" class="form-label">Promotional Details</label>
                <textarea class="form-control" id="promotional_details" name="promotional_details" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>
@endsection
