<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->username === "admin"){
            return view("dashboard.post.index", [
                "title" => "Pendaftaran Ujian TRY OUT SNBT",
                "posts" => Post::all()
            ]);
        }
        else{
            return view("dashboard.post.index", [
                "title" => "Pendaftaran Ujian TRY OUT SNBT",
                "banyakpPosts" => Post::where("user_id", auth()->user()->id)->get()->count(),
                "posts" => Post::where("user_id", auth()->user()->id)->get()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.post.create", [
            "title" => "Daftar"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'FotoDiri' => "required|image|file|max:10240",
            'FotoKTP' => "required|image|file|max:10240",          
            'Nama' => "required|max:77",
            'TempatLahir' => "required|max:35",
            'TanggalLahir' => "required|date_format:Y-m-d",
            'JenisKelamin' => "required",
            'GolDarah' => "required",
            'Alamat' => "required|max:35",
            'Provinsi' => "required|max:35",
            'Kota' => "required|max:35",
            'Kecamatan' => "required|max:35",
            'Sekolah' => "required|max:35",
            'BerkasPendaftaran' => "required|file|max:20480",
            'LokasiUjian' => "required"
        ]);
        
        $data["user_id"] = auth()->user()->id;

        $data["FotoDiri"] = $request->file("FotoDiri")->store("all-FotoDiri");
        $data["FotoKTP"] = $request->file("FotoKTP")->store("all-FotoKTP");
        $data["BerkasPendaftaran"] = $request->file("BerkasPendaftaran")->store("all-BerkasPendaftaran");

        $data["slug"] = Str::random(30);
        
        Post::create($data);

        return redirect("/dashboard/post")->with("success", "Pendaftaran ujian TRY OUT SNBT berhasil dilakukan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show",[
            "title" => "Lihat",
            "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {  
        return view("dashboard.post.edit", [
            "title" => "Edit",
            "post" => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if($request->download){
            $pdf = PDF::loadView("dashboard.post.cetak", [
                "post" => $post
            ]);
    
            return $pdf->download("Kartu Ujian.pdf");
    
            // return view("dashboard.post.cetak", [
            //     "post" => $post
            // ]);
        }

        if($request->isVerified){
            $data = $request->validate([
                "isVerified" => "required"
            ]);

            Post::where("id", $post->id)->update($data);

            return redirect("/dashboard/post")->with("success", "Verifikasi data pendaftar ujian TRY OUT SNBT berhasil dilakukan.");
        }

        $data = $request->validate([
            'FotoDiri' => "image|file|max:10240",
            'FotoKTP' => "image|file|max:10240",         
            'Nama' => "required|max:77",
            'TempatLahir' => "required|max:35",
            'TanggalLahir' => "required|date_format:Y-m-d",
            'JenisKelamin' => "required",
            'GolDarah' => "required",
            'Alamat' => "required|max:35",
            'Provinsi' => "required|max:35",
            'Kota' => "required|max:35",
            'Kecamatan' => "required|max:35",
            'Sekolah' => "required|max:35",
            'BerkasPendaftaran' => "file|max:20480",
            'LokasiUjian' => "required"
        ]);
        
        $data["user_id"] = auth()->user()->id;

        if($request->file("FotoDiri")){
            $data["FotoDiri"] = $request->file("FotoDiri")->store("all-FotoDiri");
            Storage::delete($post->FotoDiri);
        }
        if($request->file("FotoKTP")){
            $data["FotoKTP"] = $request->file("FotoKTP")->store("all-FotoKTP");
            Storage::delete($post->FotoKTP);
        }
        if($request->file("BerkasPendaftaran")){
            $data["BerkasPendaftaran"] = $request->file("BerkasPendaftaran")->store("all-BerkasPendaftaran");
            Storage::delete($post->BerkasPendaftaran);
        }

        $data["slug"] = Str::random(30);

        Post::where("id", $post->id)->update($data);

        return redirect("/dashboard/post")->with("success", "Perubahan data pendaftar ujian TRY OUT SNBT berhasil dilakukan.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->FotoDiri);
        Storage::delete($post->FotoKTP);
        Storage::delete($post->BerkasPendaftaran);
        Post::destroy($post->id);

        return redirect("/dashboard/post")->with("delete", "Penghapusan data pendaftar ujian TRY OUT SNBT berhasil dilakukan.");
    }
}