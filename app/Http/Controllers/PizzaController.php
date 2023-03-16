<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PizzaController extends Controller
{
    public function index(){
        return view('admin.pizzas.index');
    }

    public function addForm(){
        return view('admin.pizzas.add');
    }

    public function add(Request $request){
        $request->validate([
            'nom'=>'required|string|max:30',
            'description'=>'required|string',
            'prix'=>'required|numeric|between:0,999.99'
        ]);

        $pizza=new Pizza();
        $pizza->nom=$request->nom;
        $pizza->description=$request->description;
        $pizza->prix=$request->prix;
        $pizza->save();

        $request->session()->flash('etat','Ajout effectué !');

        return redirect(route('admin.pizza.uploadForm'));
    }

    public function list(){
        $pizza=Pizza::all();
        return view('admin.pizzas.all',['list'=>$pizza]);
    }



    public function editForm(){
        $pizza=Pizza::all();
        return view('admin.pizzas.edit.list',['list'=>$pizza]);
    }


    public function edit(Request $request){
        $validated=$request->validate([
            'ida'=>'required|integer'
        ]);

        $request->session()->flash('etat','Modification effectuée !');

        return redirect()->route('admin.pizzas.edit.menu',['id'=>$validated['ida']]);

    }


    public function indexEditPizza($id){
        return view('admin.pizzas.edit.menu',['ida'=>$id]);
    }

    public function editNameForm($id){
        return view('admin.pizzas.edit.name');
    }

    public function editName(Request $request,$id){
        $request->validate([
            'nom'=>'required|string|max:30'
        ]);

        $pizza=Pizza::find($id);
        $pizza->nom=$request->nom;
        $pizza->save();

        $request->session()->flash('etat','Modification effectuée !');

        return redirect()->route('admin.pizzas.edit');
    }


    public function editDescForm($id){
        return view('admin.pizzas.edit.desc');
    }


    public function editDesc(Request $request,$id){
        $request->validate([
           'description'=>'required|string'
        ]);

        $pizza=Pizza::findOrFail($id);
        $pizza->description=$request->description;
        $pizza->save();

        $request->session()->flash('etat','Modification effectuée !');
        return redirect()->route('admin.pizzas.edit');
    }

    public function delForm(){
        $pizza=Pizza::all();
        return view('admin.pizzas.delete',['list'=>$pizza]);
    }

    public function del(Request $request,$pizza_id){
        $pizza=Pizza::findOrFail($pizza_id);
        $commandePizza=DB::table('commande_pizza')->where('pizza_id','=',$pizza_id)->get();
  
        if ($commandePizza->count() > 0){
            $pizza->delete();
            $request->session()->flash('etat', 'Suppression en softDelete effectuée');
        } else {
            $pizza->forceDelete();
            $request->session()->flash('etat', 'Supprimé definitivement !');
        }

        return back();
    }


    public function listPizzas(){
        $pizzas=Pizza::paginate(2);
        return view('user.commandes.listPizza',['pizzas'=>$pizzas]);
    }

}
