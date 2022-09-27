@extends('layouts.app')
@section('menu', 'transaksi')
@section('submenu', 'registrasievent')
@section('title','Registrasi Event')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Tambah Data Registrasi Event Posyandu</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('regisevent.index') }}">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Tambah Data Registrasi Event</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
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
                                                                    <select class="col-sm-12 form-control" name="id_event"
                                                                        value="{{ old('id_event') }}">
                                                                        @foreach ($event as $key => $val)
                                                                            :
                                                                            <option value="<?= $val['id_event'] ?>">
                                                                                {{ $val['nama_event'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('id_event'))
                                                                        <div class="text-danger">
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
                                                                <label class="control-label col-sm-2">Nama Warga</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                    id="namewarga" disabled placeholder="Nama Warga">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">No Antrian</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control"
                                                                        name="no_antrian" value="{{ old('no_antrian') }}">
                                                                    @if ($errors->has('no_antrian'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('no_antrian') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-offset-5 col-sm-6">
                                                                    <p><button type="submit"
                                                                            class="btn btn-outline-primary"
                                                                            onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</button>
                                                                        <a href="{{ route('regisevent.index') }}"
                                                                            class="btn btn-outline-danger">Kembali</a>
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
        </div>
    </div>
@endsection
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#nik-dropdown').on('chage', function() {
            var id_pasien = this.value;

            $("#name-dropdown").html('');
            $.ajax({
                url: "{{ url('api/fectname') }}",
                type: "GET",
                data: {
                    id: id_pasien
                },
                dataType: "json",
                success: function(result) {
                    $('#namewarga').val(result[0].nama_pasien);

                }
                });
            });
        });
</script>
