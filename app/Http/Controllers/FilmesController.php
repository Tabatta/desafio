<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Perfil;
use App\Filme;

class FilmesController extends Controller
{
    public function index($perfil_id){
        $perfil = Perfil::find($perfil_id);

    	return view('filmes')->with(['perfil'=>$perfil]);
    }

    public function filme($perfil_id,$item_id){
        $perfil = Perfil::find($perfil_id);
        $id = $item_id;
     //   dd ($id);
    	return view('filme')->withPerfil($perfil)->withId($id);
    }

    public function create(Request $request){
	    $this->validate($request, [	        
            'id' => ['required', 'string', 'max:255'],
            'perfil_id' => ['required', 'string', 'max:255'],
	    ]);

	    $data = $request->all();
      // dd ($data);

        $filme = new Filme();
        $filme->id_filme = $data['id'];
        $filme->perfil_id = $data['perfil_id'];
        $filme->save();    	

        return  redirect()->to(url()->previous()); 
    }

    public function update($idfilme){
        $filme = Filme::find($idfilme);
        $filme->assistido = 1;
        $filme->save();

        return  redirect()->to(url()->previous());
    }

    public function delete($idfilme){

        Filme::find($idfilme)->delete();

        return  redirect()->to(url()->previous());
    }

    public function assistir($perfil_id){
        $perfil = Perfil::find($perfil_id);

    	return view('assistir')->with(['perfil'=>$perfil]);
    }

    public function assistido($perfil_id){
        $perfil = Perfil::find($perfil_id);

    	return view('assistido')->with(['perfil'=>$perfil]);
    }
}
