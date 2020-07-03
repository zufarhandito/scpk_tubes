@extends('layouts.app')
@section('content')
<div class="container mt-4">
            <div class="card mt-2">
                <div class="card-header text-center">
                    <h2><strong>Data Anak</strong></h2>
                </div>
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <input class="form-control" type="search" id="search" placeholder="Search" aria-label="Search" style="width: 350px">
                        </li>
                        <li class="list-inline-item" style="margin-left: 540px">
                            <a href="{{route('babies.create')}}" class="btn btn-primary">
                                <i class="plus icon"></i>
                                Tambah Data Anak
                            </a>
                        </li>
                    </ul>
                    <table class="table table-bordered table-hover table-striped" style="font-size: 15px; text-align: center" align="center">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center" scope="col" style="font-size: 17px; ">ID</th>
                                <th rowspan="2" style="font-size: 17px;">Nama Bayi</th>
                                <th rowspan="2" scope="col" style="font-size: 17px;">Jenis Kelamin</th>
                                <th rowspan="2" style="font-size: 17px;">Tanggal Lahir</th>                                
                                <th rowspan="2" scope="col" style="font-size: 17px;">Tinggi Badan</th>
                                <th rowspan="2" scope="col" style="font-size: 17px;">Berat Badan</th>
                                <th rowspan="2" scope="col" style="font-size: 17px;">Status Gizi</th>                                
                                <th colspan="2" scope="col" style="font-size: 17px;">Nama Orang Tua</th>                                <th rowspan="2" scope="col" style="font-size: 17px;">Alamat</th>
                                <th rowspan="2" scope="col" style="font-size: 17px; width: 150px">Aksi</th>
                            </tr>
                            <tr>
                                <th scope="col" style="font-size: 17px;">Ayah</th>
                                <th scope="col" style="font-size: 17px;">Ibu</th>
                            </tr>
                        </thead>
                        @php
                            $no=1;
                        @endphp
                        <tbody id="tabel">
                            @foreach($baby as $p)
                            <tr style="position: center center">
                                <td style="text-align: center center">{{$no++}}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->gender }}</td>
                                <td>{{ $p->age}}</td>
                                <td>{{ $p->height }}</td>
                                <td>{{ $p->weight}}</td>
                                <td><a href="{{ url('/fuzzy', $p->id) }}">status</a></td>
                                <td>{{ $p->dad}}</td>
                                <td>{{ $p->mom }}</td>
                                <td>{{ $p->address }}</td>
                                <td style="font-size: 20px">
                                    <a href="{{ route('home', $p->id) }}"><i class="blue edit icon"></i></a> |
                                    <form action="{{ route('home', $p->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: transparent; border: 0;" onclick="return confirm('Yakin hapus');"><i class="red trash alternate icon"></i></button>
                                    </form>   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
@endsection