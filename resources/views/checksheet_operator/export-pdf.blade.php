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
        /* .row {
            display: grid;
            grid-template-columns: 1fr 1fr; 
            gap: 20px;
        }
        .column {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        } */

    </style>
</head>
<body>
    <h1 style="text-align: center;">Checksheet Monitoring Operator</h1>
    <div class="row">
        <div class="column">
            <p>Mesin : {{$header->nama_mesin}}</p>
        </div>
        <div class="column">
            <p>Tanggal : {{$header->prod_date}}</p>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <p>Line : {{$header->nama_homeline}}</p>
        </div>
        <div class="column">
            <p>Operator : {{$header->nama_operator}}</p>
        </div>
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
