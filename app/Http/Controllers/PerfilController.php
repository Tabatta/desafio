<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Perfil;

class PerfilController extends Controller
{
    public function index()
    {
        $perfis = Perfil::orderBy('id')->get();
        return view('perfil')->withPerfis($perfis);
    }

    public function novo()
    {
        $perfis = Perfil::orderBy('id')->get();
        return view('novo')->withPerfis($perfis);
    }

    public function create(Request $request){
	    $this->validate($request, [
	        'name' => ['required', 'string', 'max:255'],
            'nasc' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
	    ]);

	    $data = $request->all();
       // dd ($data);
        $perfil = new Perfil();
        $perfil->nome = $data['name'];
        $perfil->dtnasc = $data['nasc'];
        $perfil->user_id = $data['user_id'];
        $perfil->save();    	

        return redirect('perfil'); 
    }

    public function delete($perfil_id){
        Perfil::find($perfil_id)->delete();

        return redirect('perfil');
    }

    public function page($perfil_id){
        $perfil = Perfil::find($perfil_id);

    	return view('page')->with(['perfil'=>$perfil]);
    }

    public function teste(){
        
    	return view('teste');
    }
}
