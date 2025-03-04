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

    </style>
</head>
<body>
    <div class="row">
        <table >
            <tr>
                <td><img src="{{asset('img/tcf-no-bg.png')}}" alt=""></td>
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
    <div class="row">
        <table class="table-approval">
            <tr style="text-align: center;">
                <td>Dibuat</td>
                <td>Dicheck</td>
            </tr>
            <tr style="height: 50px;">
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>{{$header->checked_by}}</td>
                <td>{{$header->nama_karyawan}}</td>
            </tr>
        </table>
    </div>
    
    <div class="row">
        <table style="width: 100%; border: 1px solid black;">
            <tr>
                <td>Mesin : {{$header->nama_mesin}}</td>
                <td>Tanggal : {{$header->prod_date}}</td>
            </tr>
            <tr>
                <td>Line : {{$header->nama_homeline}}</td>
                <td>Shift : {{ $header->shift == 'A1' ? 'SHIFT 1 (Waktu 3)' : ($header->shift == 'A2' ? 'SHIFT 2 (Waktu 3)' : ($header->shift == 'A3' ? 'SHIFT 3 (Waktu 3)' : ($header->shift == 'B1' ? 'SHIFT 1 (Waktu 2)' : ($header->shift == 'B2' ? 'SHIFT 2 (Waktu 2)' : $header->shift)))) }}</td>
            </tr>
        </table>
    </div>
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
