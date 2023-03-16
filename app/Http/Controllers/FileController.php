<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function storageDownload(){
        return Storage::download('file.jpg');
    }

    public function storageUploadForm(){
        return view('admin.pizzas.upload');
    }

    public function storageUpload(Request $request){
        $request->validate([
            'file'=>'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path=$request->file('file')->store('uploads');
        $request->session()->flash('etat','Téléversement effectuée');
        return redirect()->route('admin.pizzas.index');
    }

}
