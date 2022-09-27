
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left; 3%; */
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Registrasi Event</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Registrasi Event</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width; 95%;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Warga</th>
                    <th>No Antrian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetakregisevent as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p->event->nama_event }}</td>
                        <td>{{ $p->pasien->nik }} || {{ $p->pasien->nama_pasien }}</td>
                        <td>{{ $p->no_antrian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<script type="text/javascript">
  window.print();

</script>
</body>
</html>

