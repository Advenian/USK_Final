@extends('layouts.main')
@section('content')
    <div class="mt-5 pt-5 m-auto" style="width: 50%">
        <form action="{{ route('participant-update', $certificate->id) }}">
            @csrf
            Name
            <input type="text" class="form-control me-2 " name="participant_name"
                value="{{ $certificate->participant->participant_name }}"><br>
            Training
            <input type="text" class="form-control me-2 " name="training"
                value="{{ $certificate->participant->training }}"><br>
            Certificate Title
            <input type="text" class="form-control me-2 " name="title" value="{{ $certificate->title }}"><br>
            Certificate Description
            <input type="text" class="form-control me-2 " name="description" value="{{ $certificate->description }}"><br>
            Landscape

            <input type="radio" name="design" value="landscape"
                {{ $certificate->design == 'landscape' ? 'checked' : ' ' }}><br>
            Portrait
            <input type="radio" name="design" value="portrait"
                {{ $certificate->design == 'portrait' ? 'checked' : ' ' }}><br>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
@endsection
