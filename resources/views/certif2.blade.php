<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 0;
            size: 1414px 2000px;
            /* height: 1414px;
            width: 2000px; */
        }

        body {
            padding: 0;
            margin: 0;
        }

        .certificate-image {
            width: 100%;
            /* height: 1414px;
            width: 2000px;
            margin: auto;
            display: block */
        }

        .certificate-title {
            font-size: 150px;
            /* background-color: red; */
            padding: 100px
        }

        .certificate-subtitle {
            font-size: 100px;
            padding: 0
        }

        .certificate-sub-subtitle {
            font-size: 55px;
            padding: 0;
            /* padding-top: 100px; */
        }

        .certificate-name {
            font-size: 55px;
        }

        .certificate-text {
            font-size: 40px;
        }

        .certificate-subtext {
            font-size: 30px;
        }

        .certificate-border {
            margin: auto;
            border: 0px solid black;
            width: 60%;
            text-align: center;
        }

        .signature-image {
            width: 300px;

            height: 150px;
            object-fit: cover !important;
        }
    </style>
</head>

<body>
    <div style="width: 100%; position: absolute;margin: 0">
        <img src="{{ asset('certificate_blanks/2.jpg') }}" class="certificate-image" alt="">

    </div>
    <div style="position: relative; padding: 0;padding-top: 350px; text-align: center;">
        <span class="certificate-title">{{ $data->title }}</span><br>
        <span class="certificate-subtitle">{{ $data->description }}</span><br><br><br>
        <span class="certificate-sub-subtitle">This certificate is awarded to:</span><br><br><br><br>
        <span class="certificate-name">{{ $data->participant->participant_name }}</span><br><br><br>
        <hr style="width: 40%"><br><br><br>
        <span class="certificate-text">for successfully completing and being the best in the course of
        </span><br><br><br><br>
        <span class="certificate-text">{{ $data->participant->training }}</span><br><br><br><br>
        <span class="certificate-text">We send our highest praises and congratulations! </span><br>
        {{-- <span class="certificate-text">and we wish you the best going forward!</span><br><br> --}}
        <span class="certificate-text">Awarded {{ $data->setting->date }}
        </span><br>
        <br><br><br><br><br>
        <table class="certificate-border">
            <tr>
                <td><img class="signature-image" src="{{ asset($data->setting->ceo_signature) }}"
                        alt="{{ $data->setting->ceo_signature }}">
                </td>
                <td rowspan="4" style="font-size: 75px">X</td>
                <td><img class="signature-image" src="{{ asset($data->setting->trainer_signature) }}"
                        alt="{{ $data->setting->trainer_signature }}"></td>
            </tr>
            <tr>
                <td>
                    <hr style="width: 40%">
                </td>
                <td>
                    <hr style="width: 40%">
                </td>
            </tr>
            <tr>
                <td class="certificate-text">{{ $data->setting->ceo_name }}</td>
                <td class="certificate-text">{{ $data->setting->trainer_name }}</td>
            </tr>
            <tr>
                <td class="certificate-subtext">CEO of {{ $data->setting->trainer_agency }}</td>
                <td class="certificate-subtext">Trainer at {{ $data->setting->trainer_agency }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
