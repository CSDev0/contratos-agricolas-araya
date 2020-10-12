<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateContract;
use App\Region;
use App\Product;
use App\Commune;
use App\Contract;
use App\File;

class ContractController extends Controller {

    public function manage() {
        $regions = Region::all();
        $products = Product::all();
        foreach ($products as $product) {
            $obj_1[] = ['id' => $product->id, 'name' => $product->name];
        }
        foreach ($regions as $region) {
            $obj_2[] = ['id' => $region->id, 'name' => $region->name, 'ordinal_symbol' => $region->ordinal_symbol,
                'communes' => $region->communes
            ];
        }
        return view('contract.manage.index', ['products' => $obj_1, 'regions' => $obj_2]);
    }

    public function create(CreateContract $req) {
        $extension = $req->file('file')->extension();
        $path = $req->file('file')->storeAs(
                'contracts', 'nro.[' . $req->inscriptionNumber . ']-' . $req->sellerName . '-&-' . $req->buyerName . '.' . $extension, 'public'
        );
        $file = File::create([
                    'path' => $path,
                    'type' => 'pdf'
        ]);


        $only_products = json_decode($req->products);
        $products_quantities = json_decode($req->quantities, JSON_NUMERIC_CHECK);



        $regions = json_decode($req->regions);
        $communes = json_decode($req->communes, JSON_NUMERIC_CHECK);

        $rolls = json_decode($req->rolls, JSON_NUMERIC_CHECK);

        //Combinar los array de productos y array  de cantidades para asociar cada producto a una cantidad.
        $products = array_combine($only_products, $products_quantities);



        //Combinar los array de regiones y array  de comunas para asociar cada region a una cpmuna.
        $locations = array_combine($regions, $communes);

        $contract = Contract::create([
                    'inscription_number' => $req->inscriptionNumber,
                    'buyer_name' => $req->buyerName,
                    'buyer_rut' => $req->buyerRut,
                    'seller_name' => $req->sellerName,
                    'seller_rut' => $req->sellerRut,
                    'start_date' => $req->startDate,
                    'end_date' => $req->endDate,
                    'observations' => $req->observations,
                    'file_id' => $file->id
        ]);
        if ($contract) {
            foreach ($products as $key => $product) {
                $product_id = $key;
                $quantity = $product;

                $contract->products()->attach($product_id, ['quantity' => $quantity]);
            }
            foreach ($locations as $key => $location) {
                $commune_id = $location;

                $contract->communes()->attach($commune_id);
            }
            if ($rolls) {
                foreach ($rolls as $roll) {
                    $contract->farms()->create(['roll' => $roll, 'contract_id' => $contract->id]);
                }
            }

            return response()->json(200);
        }
//        $response[] = '<i class="chevron right red icon"></i> El documento seleccionado debe ser un archivo PDF de no más de 20 MB.<br>';
//        $response[] = '<i class="chevron right red icon"></i> Han faltado datos a completar del formulario.';
//        return response()->json($response, 404);
    }

}
