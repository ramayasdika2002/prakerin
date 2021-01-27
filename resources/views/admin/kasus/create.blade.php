@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data kasus
                    </div>
                    <div class="card-body">
                        <form action="{{route('kasus.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                                <label>Pilih rw</label>
                                <select name="id_rw" class="form-control">
                                @foreach ($rw as $item)
                                      <option value="{{ $item->id }}">{{$item->nama_rw}}</option>
                                @endforeach
                                </select>
                            </div>
                        <div class="form-group">
                            <label for="">Positif</label>
                            <input type="text" name="positif" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Sembuh</label>
                            <input type="text" name="sembuh" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Meninggal</label>
                            <input type="text" name="meninggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" name="tanggal" class="form-control" required>
                        </div>
                        <div class="fprm-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection