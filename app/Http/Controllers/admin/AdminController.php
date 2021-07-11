<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ( auth()->user()->permissions != '' ){
            // $ultimosequipoasociados = Equiposasociado::where("vendido","=",1)->orderBy('updated_at', 'desc')->limit(7)->get();
            // $ultimascompras = Articulo::orderBy('updated_at', 'desc')->limit(5)->get();
            // $caja = Caja::find(1);
            // $ultimosequipoasociadosalls = Equiposasociado::all();
            return view('admin.dashboard');
        }
        else{
            return redirect()->route('home');
            // return view('welcome');
        }
    }
}
