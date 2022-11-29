<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            return view('home');
        } elseif (Auth::user()->role == 'editor') {
            return redirect()->route('artikel.index');
        }
        
    }
    public function store(Request $request)
    {
        $berat = $request->berat;
        $tinggi = $request->tinggi/100;
        $dbmi = $berat/($tinggi*$tinggi);
        
        // hobi
        $c = $request->hobi;
        $hobi = explode(',', $c);
        $hb = count($hobi)-1;
        
         

        //untuk menghitung bmi
        $b = new kgratis($request->tahunlahir, $dbmi);
        $obes= $this->obesitas($dbmi);
        $data = [
            'bmi' => $dbmi,
            'obes' => $obes,
            'umur' => $b->umur_(),
            'konsul' => $b->konsul(),
            'hobi' => $hobi[rand(0, $hb)],
        ];

        return view('home', compact('data'));
    }

    public function obesitas($db)
    {
        
        if ($db < 18.5) {
            return 'kurus';
        } else if ($db < 22.9) {
            return 'normal';
        } else if($db > 29.9) {
            return 'gemuk';
        }else if ($db >30) {
            return 'obesitas';
        }
    }
}



class umur{
    public function __construct($tahun, $bmi)
    {
        $this->tahunlahir = $tahun;
        $this->BMI = $bmi;
        
    }

    public function umur_()
    {
        return 2022-$this->tahunlahir;
    }


}

class kgratis extends umur{

    public function konsul(){

        $thn_L = $this->umur_();

        if ($thn_L == 17 && $this->BMI >= 30) {
            return 'Anda mendapatkan konsultasi gratis';
        }else {
            return 'Anda tidak mendapatkan konsultasi gratis';
        }
    }   
}