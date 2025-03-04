<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checksheet Operator</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        .table-cs {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            /* table-layout: fixed; */
        }

        .table-cs td {
            border: 1px solid black;
            text-align: left;
            vertical-align: middle;
            padding: 7px;
            word-wrap: break-word;
        }
        .table-cs th {
            border: 1px solid black;
            text-align: left;
            vertical-align: middle;
            padding: 7px;
            word-wrap: break-word;
        }
        .table-header {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
        }
        .table-header td {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
            /* padding: 7px; */
            word-wrap: break-word;
        }
        .table-approval {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: 0;
        }
        .table-approval td {
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
            /* padding: 7px; */
            word-wrap: break-word;
        }
        .table-data {
            width: 100%;
            /* border-collapse: collapse; */
            margin: auto;
        }
        .table-data td {
            /* border: 1px solid black; */
            text-align: left;
            vertical-align: middle;
            /* padding: 7px; */
            word-wrap: break-word;
        }


    </style>
</head>
<body>
    <div class="row">
        <table class="table-header">
            <tr>
                <td><img src="{{public_path('img/tcf-no-bg.png')}}" alt="" style="width: 80px; height: auto;"></td>
                <td><h1 style="text-align: center;">CHECKSHEET PENGAWASAN OPERATOR</h1></td>
                <td style="text-align: left">
                    <p>Doc No      : TCF2/Form/Prod/01/06</p>
                    <p>Revision No : 00</p>
                    <p>Issued Date : 29/11/2019</p>
                    <p>Page        : 1/1</p>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row" >
        <table class="table-approval">
            <tr style="text-align: center;">
                <td>Dibuat</td>
                <td>Dicheck</td>
            </tr>
            <tr style="height: 50px;">
                <td><img src="{{public_path('img/check.png')}}" alt="" style="width: 30px; height: auto;"></td>
                <td>
                    @if($header->checked_by)
                        <img src="{{public_path('img/check.png')}}" alt="" style="width: 30px; height: auto;">
                    @endif
                </td>
            </tr>
            <tr>
                <td>{{$header->nama_karyawan}}</td>
                <td>{{$header->checked_by}}</td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row">
        <table class="table-data">
            <tr>
                <td><strong>Mesin</strong></td>
                <td><strong> : </strong></td>
                <td><strong>{{$header->nama_mesin}}</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Tanggal</strong></td>
                <td><strong> : </strong></td>
                <td><strong>{{ \Carbon\Carbon::parse($header->prod_date)->format('d-m-Y') }}</strong></td>
            </tr>
            <tr>
                <td><strong>Line : </strong></td>
                <td><strong> : </strong></td>
                <td><strong>{{$header->nama_homeline}}</strong></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Shift</strong></td>
                <td><strong> : </strong></td>
                <td><strong>{{ $header->shift == 'A1' ? 'SHIFT 1 (Waktu 3)' : ($header->shift == 'A2' ? 'SHIFT 2 (Waktu 3)' : ($header->shift == 'A3' ? 'SHIFT 3 (Waktu 3)' : ($header->shift == 'B1' ? 'SHIFT 1 (Waktu 2)' : ($header->shift == 'B2' ? 'SHIFT 2 (Waktu 2)' : $header->shift)))) }}</strong></td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row">
        <table class="table-cs" id="detail-checksheet">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Point Supervisi</th>
                    <th>Plan Checked</th>
                    <th>Actual Checked</th>
                    <th>Status</th>
                    <th>Uraian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lines as $index => $line )
                <tr>
                    <td>{{$line->pointspv->order_no}}</td>
                    <td>{{$line->pointspv->name}}</td>
                    <td>{{$line->group_shift->time}}</td>
                    <td>{{ \Carbon\Carbon::parse($line->checked_at)->format('H:i') }}</td>
                    <td>{{$line->status}}</td>
                    <td>{{$line->description}}</td>
                </tr>
                
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
