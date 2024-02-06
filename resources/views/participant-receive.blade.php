@extends('layouts.main')
@section('content')
    <div style="width: 90%; margin: auto; height: 100vh" class="d-flex flex-column">
        <div style="width: 60%; margin: auto;">
            <h1 class="mb-2 mt-5">Get Your Certificate Here!</h1>
            <form action="{{ route('certificate-search') }}" method="GET" style="width: 100%">
                @csrf
                <input class="form-control me-2 mb-4" style="width: 100%" type="search" placeholder="Search"
                    name="participant_name" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
            <table style="width: 100%" class="mt-5">
                @foreach ($results as $participant)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $participant->participant_name }}</td>
                        <td>{{ $participant->certificate->certificate_code }}</td>
                        <td>{{ $participant->training }}</td>
                        <td><a href="{{ route('participant-print', $participant) }}">Print</a></td>
                    </tr>
                @endforeach
            </table>
        </div>


    </div>
@endsection
