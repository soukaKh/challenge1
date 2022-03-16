<?php

namespace App\Http\Controllers;
use App\Models\Eleve;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index()
    {
        return Eleve::all();
    }
    public function show($id)
    {
        $eleve=Eleve::findOrFail($id);
        return $eleve;
    }
    public function store(Request $request)
    {
        try {
            $eleve=new Eleve();
            $eleve->name=$request->name;
            $eleve->prenom=$request->prenom;
            $eleve->date_nais=$request->date_nais;
            $eleve->code_massar=$request->code_massar;
            $eleve->niveau=$request->niveau;
            $eleve->img=$request->img;
            if($eleve->save()){
                 return response()->json(['status'=>'success','message'=>'eleve created successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function update(Request $request,$id)
    {
        try { 
            $eleve=Eleve::findOrFail($id);
            $eleve->name=$request->name;
            $eleve->prenom=$request->prenom;
            $eleve->date_nais=$request->date_nais;
            $eleve->code_massar=$request->code_massar;
            $eleve->img=$request->img;
            $eleve->niveau=$request->niveau;
            if($eleve->save()){
                 return response()->json(['status'=>'success','message'=>'eleve updated successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function delete($id)
    {
        try {
            $eleve=Eleve::findOrFail($id);
            if($eleve->delete()){
                 return response()->json(['status'=>'success','message'=>'eleve deleted successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function RFID()
    {
        $a='En attente';
        $resultat=DB::select('select e.img as photoenfant,e.name as nomenfant,p.img as photoparent,p.name as nompere
        from eleves as e ,peres p,eleve_parents ep 
        where p.id=ep.parent_id and e.id=ep.eleve_id and p.etat=?',[$a]);
        return $resultat;
    }
}
