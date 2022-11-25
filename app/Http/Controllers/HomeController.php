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
        
        //untuk menghitung bmi
        $a = new konsul($request->berat, $request->tinggi);
        $b = new kgratis($request->tahunlahir, $dbmi);
        $c = $request->hobi;
        // $a->bmi();
        // $a->obes();
        $data = [
            'bmi' => $a->bmi(),
            'obes' => $a->obes(),
            'umur' => $b->umur_(),
            'konsul' => $b->konsul(),
            'hobi' => $c
        ];

        return view('home', compact('data'));
    }
}

class hitung
{
    public function __construct($berat, $tinggi)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }
}

class konsul extends hitung
{
    public function obes()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18.5) {
            return 'kurus';
        } elseif ($dbmi <= 29.5) {
            return 'gemuk';
        } else if($dbmi > 30) {
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