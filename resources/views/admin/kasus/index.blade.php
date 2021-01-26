@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                        Data Kota
                    <a href="{{route('kasus.create')}}"
                        class="btn btn-dark float-right">
                        Tambah
                    </a>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                <tr>
                                    <th>No</th>
                                    <th>Positif<th>
                                    <th>sembuh</th>
                                    <th>meninggal</th>
                                    <th>tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                @php
                                    $no=1;
                                @endphp
                                @foreach ($kasus as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->positif}}</td>
                                        <td>{{$data->sembuh}}</td>
                                        <td>{{$data->meninggal}}</td>
                                        <td>{{$data->tanggal}}</td>
                                        <td>
                                            <form action="{{route('kasus.destroy', $data->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{route('kasus.edit', $data->id)}}" class="btn btn-success">Edit</a>
                                                <a href="{{route('kasus.show', $data->id)}}" class="btn btn-info">Show</a>
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