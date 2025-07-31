<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index() {
        return response()->json(Product::all()); // retourne tous les produits
    }

    // public function store(Request $request)
    // {
    //     $product = Product::create([
    //         'name' => $request->name,
    //         'qty' => $request->quantity,
    //         'limit' => $request->limit,
    //         'status' => $request->status,
    //     ]);

    //     return response()->json([
    //         "status" => true,
    //         "title" => "AJOUT REUSSI",
    //         "message" => "Produit ".$product->name." ajouté avec succès",
    //     ]);
    // }

    public function store(Request $request) {

        $errors = [
            'name.required'=> 'Vous devez sélectionner un nom pour le produit',
            'quantity.required'=> 'Vous devez renseigner une quantité',
            'limit.required'=> 'Vous devez renseigner une limite',
            'status.required'=> 'Vous devez sélectionner un statut',
        ];
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'quantity' => 'required',
            'limit' => 'required',
            'status' => 'required',
        ], $errors);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "title" => "AJOUT ECHOUE",
                "message" => $validator->errors()->first()
            ]);
        }else{
            $product = Product::create([
                'name' => $request->name,
                'qty' => $request->quantity,
                'limit' => $request->limit,
                'status' => $request->status,
            ]);

            return response()->json([
                "status" => true,
                "title" => "AJOUT REUSSI",
                "message" => "Produit ".$product->name." ajouté avec succès",
            ]);
        }
    }
}