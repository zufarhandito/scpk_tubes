@extends('layouts.app')

@section('content')
    <div class="container">
   <!-- Remove This Before You Start -->
   <h1>Edit Data Anak</h1>
   <hr>
   @if (count($errors) > 0)
   <div class="alert alert-danger">
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
   <form action="" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
       <div class="form-group">
           <label for="name">Nama Bayi:</label>
           <input type="text" class="form-control" id="" name="name" value="{{ $p->name }}">
       </div>
       <div class="form-group">
            <label for="name">Jenis Kelamin:</label>
            <input type="radio" class="form-control" id="" name="gender" value="Laki-Laki">
            <input type="radio" class="form-control" id="" name="gender" value="Perempuan">
        </div>
        <div class="form-group">
            <label for="name">Usia(bulan)</label>
            <input type="text" class="form-control" id="" name="age" value="{{ $p->age }}">
        </div>
        <div class="form-group">
            <label for="name">Tinggi Badan:</label>
            <input type="text" class="form-control" id="" name="height" value="{{ $p->height }}">
        </div>                
       <div class="form-group">
            <label for="day">Berat Badan: </label>
            <input type="text" class="form-control" id="" name="weight" value="{{ $p->weight }}">
        </div>
       <div class="form-group">
           <label for="open">Nama Ayah: </label>
           <input type="text" class="form-control" id="" name="dad" value="{{ $p->dad }}">
       </div>
       <div class="form-group">
           <label for="close">Nama Ibu: </label>
           <input type="text" class="form-control" id="" name="mom" value="{{ $p->mom }}">
       </div>
       <div class="form-group">
            <label for="desc">Alamat:</label>
            <textarea class="form-control" id="alamat" name="address" >{{ $p->address }}</textarea>
        </div>
       <div class="form-group">
           <button type="submit" class="btn btn-md btn-primary">Submit</button>
           <button type="reset" class="btn btn-md btn-danger">Cancel</button>
       </div>
   </form>
    </div>
@endsection







