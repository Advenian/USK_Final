<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Certificate;
use App\Models\Participant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::with('certificate')->get();
        // return $participants;
        return view('participant-index', compact('participants'));
    }
    public function home()
    {
        $results = [];
        return view('participant-receive', compact('results'));
    }
    public function search(Request $request)
    {
        // return view('participant-receive');

        $data = $request->validate(
            ['participant_name' => 'required|string']
        );
        // $searchTerm = 'Khairul Akmal';
        $searchTerm = $data['participant_name'];

        // return $searchTerm;
        $participants = Participant::with('certificate');

        $results = $participants->where('participant_name',  $searchTerm)->get();
        // return $results;
        return view('participant-receive', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('partificate-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $setting;
        // return $request;
        $datas = $request->validate([
            'participant_name' => 'required|string',
            'training' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'design' => 'required|string',
        ]);
        // return $datas;

        $participant = Participant::create([
            'participant_name' => $datas['participant_name'],
            'training' => $datas['training'],
        ]);
        $setting = Setting::first();
        $uuid = rand(100, 999);


        $certificate = Certificate::create([
            'participant_id' => $participant->id,
            'setting_id' => $setting->id,
            'certificate_code' => '00' . $participant->id . '0' . $uuid,
            'title' => $datas['title'],
            'description' => $datas['description'],
            'design' => $datas['design'],

        ]);


        return redirect(route('participant-index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function PDFDownload(Certificate $certificate)
    {

        $data = $certificate;
        // return $data;

        if ($data->design == 'landscape') {
            $pdf = Pdf::loadView('certif1', compact('data'));
        } else {
            $pdf = Pdf::loadView('certif2', compact('data'));
        }


        return $pdf->stream('certificate.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        // return $certificate;
        return view('participant-edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certificate $certificate)
    {
        // return $request;
        $datas = $request->validate([
            'participant_name' => 'nullable|string',
            'training' => 'nullable|string',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'design' => 'required|string',
        ]);
        // return $datas['participant_name'];



        $certificate->participant->participant_name = $datas['participant_name'];
        // return $certificate;
        $certificate->participant->training = $datas['training'];
        // return $certificate;
        $certificate->title = $datas['title'];
        // return $certificate;
        $certificate->description = $datas['description'];
        // return $certificate;
        $certificate->design = $datas['design'];
        // return $certificate;
        // return $certificate;


        $certificate->save();
        $certificate->participant->save();


        return redirect(route('participant-index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(Participant $certificate)
    {
        // return 'Halo';
        // return $certificate;
        $certificate->delete();
        return redirect(route('participant-index'));
    }
}
