@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        Data Kota
                    <a href="{{route('kota.create')}}"
                        class="btn btn-dark float-right">
                        Tambah
                    </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kota<th>
                                    <th>Nama Kota</th>
                                    <th>Provinsi</th>
                                    <th>aksi</th>
                                </tr>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($kota as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->kode_kota}}</td>
                                        <td>{{$data->nama_kota}}</td>
                                        {{-- <td>{{$data->provinsi->nama_provinsi}}</td> --}}
                                        <td>
                                            <form action="{{route('kota.destroy', $data->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{route('kota.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                                <a href="{{route('kota.show', $data->id)}}" class="btn btn-info">Show</a>
                                                <button type="submit" class="btn btn-danger">Delete</button>
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