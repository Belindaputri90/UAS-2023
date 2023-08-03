<?php

namespace App\Http\Controllers;
use App\Models\Posting;

use Illuminate\Http\Request;

class PostingController extends Controller
{
    //
    public function index(){
        $posting = Posting::all();
        return $posting;
    }
    public function show($id){
        
        try{
            $posting = Posting::find($id);
            return $posting;
        } catch(\Throwable $th){
            $pesan = array("pesan"=>$th->getMessage());
            return response($pesan,500);
        }
    }

    public function store(Request $request){
        try{
            $posting = new Posting();
            $posting->posting = $request->posting;
            $posting->save();
            
            return $posting;
        } catch(\Throwable $th){
            $pesan = array("pesan"=>$th->getMessage());
            return response($pesan,500);
        }
    }

    public function update(Request $request){
        try{
           $user = Posting::find($request->id);

            $user->posting = $request->posting;

            $user->save();

            $pesan = "Berhasil Update Data!";
            return response($pesan,200);

        } catch(\Throwable $th){
            $pesan = array("pesan"=>$th->getMessage());
            return response($pesan,500);
        }

    }

    public function destroy(Request $request){
        try{
            $posting = Posting::find($request->id);
            $posting->delete();
            
            $pesan = "Berhasil Hapus Data!";
            return response($pesan,200);
        } catch(\Throwable $th){
            $pesan = array("pesan"=>$th->getMessage());
            return response($pesan,500);
        }
    }

    

}
