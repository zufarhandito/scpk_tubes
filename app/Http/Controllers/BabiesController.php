<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;
use Illuminate\Support\Facades\Input;

class BabiesController extends Controller
{
    public function index()
    {
        $baby = baby::paginate(4);
        return view('Data Anak/index', ['baby'=>$baby]);
    }
    public function create()
    {
        return view('Data Anak/add');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'alpha' => ':attribute harus berupa huruf saja',
            'numeric' => ':attribute harus berupa angka saja',
        ];

        $attributes=[
            'name' =>'Nama Bayi',
            'gender' => 'Jenis Kelamin',
            'age' => 'Usia',
            'height' => 'Tinggi Badan',
            'weight' => 'Berat Badan',
            'dad' => 'Nama Ayah',
            'mom' => 'Nama Ibu' ,
            'address' => 'Alamat'                        

        ];

        $this->validate($request,[
            'name' => 'required|alpha',
            'gender' => 'required',
            'age' => 'required',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'dad' => 'required|alpha',
            'mom' => 'required|alpha', 
            'address' =>'required'

        ], $messages, $attributes);

        Baby::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'height' => $request->height,
            'weight' => $request->weight,
            'dad' => $request->dad,
            'mom' => $request->mom, 
            'address' => $request->address
        ]);
        session()->flash('notif', 'Data berhasil ditambahkan');

        return redirect()->route('babies.index');

    }

    
}