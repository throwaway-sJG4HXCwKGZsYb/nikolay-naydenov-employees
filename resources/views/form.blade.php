@extends('layout')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="fileInput" class="form-label">Choose File</label>
            <input type="file" class="form-control" id="fileInput" name="file" required>
        </div>
        <button type="submit" class="btn btn-primary" formaction="{{ route('pairs') }}">View employee pairs</button>
        <button type="submit" class="btn btn-primary" formaction="{{ route('max-overlap-pair') }}">Show max overlap pair
        </button>
    </form>
@endsection


