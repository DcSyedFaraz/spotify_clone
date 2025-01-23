<!-- resources/views/artist/events/edit.blade.php -->

@extends('layout.app')

@section('content')
    <div class="container">
        <h1>Edit Event: {{ $event->title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('artist.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Event Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $event->title) }}" required>
            </div>
            <!-- Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Event Image</label>
                <input type="file" class="form-control" id="image" name="image"
                    accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml">
                @if ($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="mt-2" width="150">
                @endif
            </div>

            <!-- Event Date -->
            <div class="mb-3">
                <label for="event_date" class="form-label">Event Date & Time</label>
                <input type="datetime-local" class="form-control" id="event_date" name="event_date"
                    value="{{ old('event_date', $event->event_date->format('Y-m-d\TH:i')) }}" required>
            </div>

            <!-- Ticket Link -->
            <div class="mb-3">
                <label for="ticket_link" class="form-label">Ticket Purchase Link (optional)</label>
                <input type="url" class="form-control" id="ticket_link" name="ticket_link"
                    value="{{ old('ticket_link', $event->ticket_link) }}">
            </div>

            <!-- Promotional Details -->
            <div class="mb-3">
                <label for="promotional_details" class="form-label">Promotional Details</label>
                <textarea class="form-control" id="promotional_details" name="promotional_details" rows="3">{{ old('promotional_details', $event->promotional_details) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
@endsection
