@extends('layouts.main')
@section('content')
    <div class="d-flex flex-column justify-content-center m-auto pb-5" style="width: 50%; padding-top: 75px;">
        <form action="{{ route('setting-update', $setting) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            CEO Name
            <input type="text" class="form-control me-2 " name="ceo_name" value="{{ $setting->ceo_name }}"><br>
            Trainer Name
            <input type="text" class="form-control me-2 " name="trainer_name" value="{{ $setting->trainer_name }}"><br>
            Agency
            <input type="text" class="form-control me-2 " name="trainer_agency"
                value="{{ $setting->trainer_agency }}"><br>
            Place
            <input type="text" class="form-control me-2 " name="place" value="{{ $setting->place }}"><br>
            Date
            <input type="date" class="form-control me-2 " name="date" value="{{ $setting->date }}"><br>

            <img class="signature-image" src="{{ asset($setting->ceo_signature) }}" alt=" {{ $setting->ceo_signature }}">
            <br>
            <div class="mb-1">
                <label for="formFile" class="form-label">CEO Signature</label>
                <input class="form-control" type="file" name="ceo_signature" id="formFile">
            </div><br>
            <img class="signature-image" src="{{ asset($setting->trainer_signature) }}"
                alt=" {{ $setting->trainer_signature }}"><br>
            <div class="mb-1">
                <label for="formFile" class="form-label">Trainer Signature</label>
                <input class="form-control" type="file" name="trainer_signature" id="formFile">
            </div><br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
