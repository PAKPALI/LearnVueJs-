<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        return Product::all(); // retourne tous les produits
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nom' => 'required|string|min:3',
            'quantite' => 'required|integer|min:1',
            'limite' => 'required|integer|min:1',
            'status' => 'required|in:1,2',
        ]);

        $errors = [
            'nom.required'=> 'Vous devez sélectionner un nom pour le produit',
            'quantite.required'=> 'Vous devez renseigner une quantité',
            'limite.required'=> 'Vous devez renseigner une limite',
            'status.required'=> 'Vous devez sélectionner un statut',
        ];
        $validator = Validator::make($request->all(),[
            'nom' => 'required|string|min:3',
            'quantite' => 'required|integer|min:1',
            'limite' => 'required|integer|min:1',
            'status' => 'required|in:1,2',
        ], $errors);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "title" => "AJOUT ECHOUE",
                "message" => $validator->errors()->first()
            ]);
        }else{
            $input = $request->all();
            $name = $input['region_name'];

            $produit = Product::create($validated);
            return response()->json($produit, 201); // retourne le produit créé
        }
    }
}
