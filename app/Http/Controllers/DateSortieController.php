<?php

namespace App\Http\Controllers;
use App\Models\Pere;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DateSortie;
Use \Carbon\Carbon;
class DateSortieController extends Controller
{
    public function index()
    {
        $resultat=DB::select('select parent_id,p.name,p.prenom,s."date_S" 
        from peres P,date_sorties s where 
        p.id=s.parent_id');
        return $resultat;
    }
    public function show($id)
    {
        $id_p=Pere::findOrFail($id);
        $resultat=DB::select('select parent_id,p.name,p.prenom,s."date_S" 
        from peres P,date_sorties s where 
        p.id=s.parent_id and parent_id=?',[$id]);
        return ($resultat);
    }
    public function store(Request $request)
    {
        try {
            $date=new DateSortie();
            $date->parent_id=$request->id;
            $date->date_S=Carbon::now();
            if($date->save()){
                 return response()->json(['status'=>'success','message'=>'successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function update(Request $request,$id)
    {
        try {
            $date=DateSortie::findOrFail($id);
            $date->parent_id=$request->id;
            $date->date_S=$request->date_E;
            if($date->save()){
                 return response()->json(['status'=>'success','message'=>'successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
    public function delete($id)
    {
        try {
            $date=DateSortie::findOrFail($id);
            if($date->delete()){
                 return response()->json(['status'=>'success','message'=>'eleve deleted successfully']);
            }
        }
        catch(exception $e){
          return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }
}
