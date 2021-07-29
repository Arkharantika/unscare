<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserData;
use App\Models\ClaimCovid;
use App\Models\ClaimVaksin;

class ClaimController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $complete = UserData::where('id_user',$user->id)->get()->first();
        $data = ClaimCovid::where('id_user',$user->id)->get()->last();
        $vaksin = ClaimVaksin::where('id_user',$user->id)->get()->last();

        return view('claim',compact('user','complete','data','vaksin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $complete = UserData::where('id_user',$user->id)->get()->first();

        $hasiltest = $request->file('file_hasil');
        
        $nama_gambar = "foto_positif_".$complete->nim_nip.".".$hasiltest->getClientOriginalExtension();

        $hasil_upload = 'folder_covid';
        $hasiltest->move($hasil_upload,$nama_gambar);
        
        ClaimCovid::create( 
            ['id_user'         => $complete->id_user,
            'gambar_hasiltest' => $nama_gambar, 
            'keterangan'       => $request->keterangan,
            'sembuh'           => 'belum'
       ]);

       return redirect('user/claimcovidvaksin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $complete = ClaimCovid::where('id_user',$user->id)->get()->first();

        
        ClaimCovid::where('id_user',$id)->update(
                [
                        'sembuh'=>'sudah'
                    ]
                );
                
                // // $hasiltest = $request->file('file_hasil');
                
                // // $nama_gambar = "foto_positif_".$complete->nim_nip.".".$hasiltest->getClientOriginalExtension();
                
                // // $hasil_upload = 'folder_covid';
                // // $hasiltest->move($hasil_upload,$nama_gambar);
                
        // return $complete;
        return redirect('user/claimcovid');
    }

    public function update2(Request $request, $id)
    {
        return 0;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
