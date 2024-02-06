@extends('layouts.main')
@section('content')
    <div class="mt-5 pt-5 m-auto" style="width: 50%">
        <form action="{{ route('participant-store') }}">
            @csrf
            Name
            <input type="text" class="form-control me-2 " name="participant_name" required><br>
            Training
            <input type="text" class="form-control me-2 " name="training" required><br>
            Certificate Title
            <input type="text" class="form-control me-2 " name="title" required><br>
            Certificate Description
            <input type="text" class="form-control me-2 " name="description" required><br>
            Landscape
            <input type="radio" name="design" value="landscape" required><br>
            Portrait
            <input type="radio" name="design" value="portrait" required><br>
            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>
@endsection
