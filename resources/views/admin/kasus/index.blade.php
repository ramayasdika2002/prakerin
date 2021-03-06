@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data kasus
                    <a href="{{route('kasus.create')}}"
                       class="btn btn-primary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <tr>
                                <th>No</th>
                             
                               
                                <th>Jumlah Positif</th>
                                <th>Jumlah Sembuh</th>
                                <th>Jumlah Meninggal</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($kasus as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                {{-- <td>Desa : {{$data->rw->desa->nama_desa}}<br>
                                    Kecamatan : {{$data->rw->desa->kecamatan->nama_kecamatan}}<br>
                                    Kota : {{$data->rw->desa->kecamatan->kota->nama_kota}}<br>
                                    Provinsi : {{$data->rw->desa->kecamatan->kota->provinsi->nama_provinsi}}</td> --}}
                                
                                <td>{{$data->positif}}</td>
                                <td>{{$data->sembuh}}</td>
                                <td>{{$data->meninggal}}</td>
                                <td>{{$data->tanggal}}</td>
                                
                                <td>
                                    <form action="{{route('kasus.destroy',$data->id)}}" method="post">
                                        @csrf @method('delete')
                                        <a href="{{route('kasus.edit',$data->id)}}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{route('kasus.show',$data->id)}}" class="btn btn-warning btn-sm">Show</a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection