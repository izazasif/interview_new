<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {   
        $data = Product::leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
                         ->leftjoin('product_variant_prices','products.id', '=', 'product_variant_prices.product_id')
                        ->select('products.id','products.title','products.sku','products.description','product_variants.variant','product_variant_prices.price','product_variant_prices.stock')
                        ->paginate(10);
            $data1 = ProductVariant::get();
        return view('products.index')->with(compact('data','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = new Product();
        
        $data->title = $request->title;
        $data->sku = $request->sku;
        $data->description = $request->description;
        $data->save();

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$product)
    {   
        // dd($request->all());
        
          $data1 = ProductVariant::get(); 

            if($request->title != null)
            {
                $data = Product::leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->leftjoin('product_variant_prices','products.id', '=', 'product_variant_prices.product_id')
               ->select('products.id','products.title','products.sku','products.description','product_variants.variant','product_variant_prices.price','product_variant_prices.stock')
              ->where('products.title', 'LIKE', "%{$request->title}%")->paginate(10);
            }
            if($request->variant != null)
            {
            $data = Product::leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
                           ->leftjoin('product_variant_prices','products.id', '=', 'product_variant_prices.product_id')
                          ->select('products.id','products.title','products.sku','products.description','product_variants.variant','product_variant_prices.price','product_variant_prices.stock')
                         ->where('product_variants.variant', 'LIKE', "%{$request->variant}%")->paginate(10);
            }
           
            return view('products.index',compact('data','data1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        
        $variants = Variant::all();
        return view('products.edit', compact('variants','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $data = Product::findOrFail($request->id);
        $data->update($request->all());

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
