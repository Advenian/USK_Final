<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            /* border-collapse: collapse; */
            padding: 10px;
            border-radius: 11px;
        }

        .container {
            width: 80vw;
            margin: auto;
        }

        .participant-table {
            width: 100%;
            margin: auto;
        }

        .iteration-column {
            width: 5%;
        }

        .name-column {
            width: 20%
        }

        .code-column {
            width: 20%
        }

        .action-column {
            width: 10%;
        }

        .training-column {
            width: 45%;
        }

        .add-participant-button {
            padding: 10px;
        }

        .signature-image {
            width: 300px;

            height: 150px;
            object-fit: cover !important;
        }
    </style>
</head>

<body>
    {{-- //sidebar --}}

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            @if (Auth::check())
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                    aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                            @if (Auth::check())
                                {{ auth()->user()->name }}
                            @endif
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page"
                                    href="{{ route('participant-index') }}">Participants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ url('admin/setting/1') }}">Setting</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" style="padding: 0; background-color: transparent; border: 0">
                                        <a class="nav-link" aria-current="page">Logout</a></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <h4 class="hidden">PADDING</h1>
            @endif

        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
