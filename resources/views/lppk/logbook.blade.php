@extends('layout.main')
@section('title', 'Logbook LPPK')
@section('main')
<div class="container-ful">
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h3 class="page-title">Logbook Monitoring LPPK</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{route('lppk-main')}}">LPPK</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Logbook </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="box">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary">
                        <tr>
                            <th rowspan="2" class="text-center">No.</th>
                            <th rowspan="2" class="text-center">Part No./Name</th>
                            <th rowspan="2" class="text-center">Problem Description</th>
                            <th rowspan="2" class="text-center">No. LPPK</th>
                            <th rowspan="2" class="text-center">Tanggal Dibuat</th>
                            <th rowspan="2" class="text-center">Target Close</th>
                            <th colspan="3" class="text-center">Status Problem</th>
                            <th rowspan="2" class="text-center">Pembuat</th>
                        </tr>
                        <tr>
                            <th class="text-center">Open</th>
                            <th class="text-center">Progress</th>
                            <th class="text-center">Close</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>5305A781</td>
                            <td>Mesin Mati</td>
                            <td>LPPK/QC/01/212/24/</td>
                            <td>14/12/2024</td>
                            <td>16/12/2024</td>
                            <td>N</td>
                            <td>Y</td>
                            <td>N</td>
                            <td>Wahyu Adhanta</td>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>5305A781</td>
                            <td>Mesin Mati</td>
                            <td>LPPK/QC/01/212/24/</td>
                            <td>14/12/2024</td>
                            <td>16/12/2024</td>
                            <td>N</td>
                            <td>Y</td>
                            <td>N</td>
                            <td>Wahyu Adhanta</td>
                            </th>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>5305A781</td>
                            <td>Mesin Mati</td>
                            <td>LPPK/QC/01/212/24/</td>
                            <td>14/12/2024</td>
                            <td>16/12/2024</td>
                            <td>N</td>
                            <td>Y</td>
                            <td>N</td>
                            <td>Wahyu Adhanta</td>
                            </th>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>


</div>



@endsection