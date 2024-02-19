<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
      $produk = produk::all();
      return view('produk.index',compact('produk'));
    }


    public function create(){
      return view('produk.create');
    }

    public function store(){
      $new = new produk;

      $new->NamaProduk = request('NamaProduk');
      $new->Harga = request('Harga');
      $new->Stock = request('Stock');
      $new->save();

      return redirect('produk')->with('pesan','Data Berhasilimpan');
    }

    public function destroy()
    {
        $id = request('id');
        // dd($id);
        $data = produk::where('ProdukID',$id)->delete();
        
        return redirect('produk')->with('pesan','data berhasil di hapus');
    }

    public function edit(){
      $id = request('id');
      $data = produk::where('ProdukID',$id)->first();
      return view('produk.edit',compact('data'));
    }

    public function update()
    {
        $id = request('id');
        
        $data = produk::where('ProdukID',$id)->first();
        $data->NamaProduk = request('NamaProduk');
        $data->Harga = request('Harga');
        $data->Stock = request('Stock');
        $data->update();
        return redirect('produk')->with('pesan','Data di ubah');
    }

}
