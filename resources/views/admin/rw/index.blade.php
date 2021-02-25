@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        Data Kota
                    <a href="{{route('rw.create')}}"
                        class="btn btn-dark float-right">
                        Tambah
                    </a>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Rw</th>
                                            <th>Desa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($rw as $data)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td> {{$data->nama_rw}} </td>
                                                <td> {{$data->desa->nama_desa}} </td>
                                                <td>
                                            <form action="{{route('rw.destroy', $data->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{route('rw.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                                <a href="{{route('rw.show', $data->id)}}" class="btn btn-info">Show</a>
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