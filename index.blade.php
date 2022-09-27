@extends('layouts.app')
@section('menu', 'transaksi')
@section('submenu', 'registrasievent')
@section('title','Registrasi Event')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><center><font color="73A9AD">Registrasi Event Posyandu</font></center></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('regisevent.index') }}">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Tambah Data</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            @if (session('Data dihapus'))
                <div class="alert alert-danger" role="alert">
                    {{ session('Data dihapus') }}
                </div>
            @endif

            @if (session('Data diedit'))
                <div class="alert alert-success" role="alert">
                    {{ session('Data diedit') }}
                </div>
            @endif

            @if (session('Data ditambah'))
                <div class="alert alert-success" role="alert">
                    {{ session('Data ditambah') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="panel panel-default">
                            <div class="card-header">
                                <!--/.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card" style="margin-top: 10px;">
                                                    <div class="card-header">
                                                        <div class="float-sm-left">
                                                            <p>Tambah Data Registrasi Event</p>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <form class="form-horizontal" action="/regisevent/store"
                                                            method="post"> {{ csrf_field() }}
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Nama Event</label>
                                                                <div class="col-sm-10">
                                                                    <select class="col-sm-12 form-control" name="id_event">
                                                                        @foreach ($event as $key => $val)
                                                                            :
                                                                            <option value="<?= $val['id_event'] ?>">
                                                                                {{ $val['nama_event'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('id_event'))
                                                                        <div class="select-danger">
                                                                            {{ $errors->first('id_event') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">NIK Warga</label>
                                                                <div class="col-sm-10">
                                                                    <select class="col-sm-12 form-control" name="id_pasien" id="nik-dropdown">
                                                                        <option value="0" aria-readonly="true">-- Select NIK Warga --</option>
                                                                        @foreach ($pasien as $key => $val)
                                                                            :
                                                                            <option value="<?= $val['id_pasien'] ?>">
                                                                                {{ $val['nik']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('id_pasien'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('id_pasien') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2"> Nama Warga </label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="namewarga" disabled placeholder="Nama Warga">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">No Antrian</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control"
                                                                        name="no_antrian">
                                                                    @if ($errors->has('no_antrian'))
                                                                        <div class="number-danger">
                                                                            {{ $errors->first('no_antrian') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-offset-5 col-sm-6">
                                                                    <p><button type="submit"
                                                                            class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card" style="margin-top: 10px">
                    <div class="panel panel-default">
                        <div class="card-header">
                            <div class="col-md-12">
                                <div class="float-sm-left">
                                    {{-- <p>Data Registrasi Event</p> --}}
                                    <p><a href="/cetakregisevent" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"> Cetak Data</i></a></p>
                                </div>
                            </div>
                            <!--/.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table id="table-data" class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID Registrasi</th>
                                            <th>Nama Event</th>
                                            <th>Warga</th>
                                            <th>No Antrian</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($regisevent as $i => $p)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $p->event->nama_event }}</td>
                                                <td>{{ $p->pasien->nik }} || {{ $p->pasien->nama_pasien }}</td>
                                                <td>{{ $p->no_antrian }}</td>
                                                <td>
                                                    <form method="post"
                                                        action="{{ route('regisevent.destroy', $p->id_regisevent) }}">
                                                        {{ csrf_field() }}
                                                        <a href="{{ route('regisevent.show', $p->id_regisevent) }}"
                                                            class="btn btn-outline-warning"><i
                                                                class="nav-icon fa fa-thin fa-eye"></i></a>
                                                        <a href="{{ route('regisevent.edit',$p->id_regisevent) }}" class="btn btn-outline-success"><i class="nav-icon fa fa-solid fa-marker"></i></a>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')"><i class="nav-icon fa fa-thin fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nik-dropdown').on('change', function() {
            var id_pasien = this.value;
            console.log(id_pasien);
            $("#name-dropdown").html('');
            $.ajax({
                url: "{{ url('api/fetchnamepasien') }}",
                type: "GET",
                data: {
                    id: id_pasien
                },
                dataType: "json",
                success: function(result) {
                    console.log(result[0]);
                    $('#namewarga').val(result[0].nama_pasien);
                    
                }
            });
        });
    });
</script>

