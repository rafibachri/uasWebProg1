<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Vegetable;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ItemController extends Controller
{
    public function data(){
        $itemlist = Vegetable::all();

        return view('vegetable',compact('itemlist'));
    }

    public function detail($id)
    {
        $vegetabledetail = Vegetable::findOrFail($id);
        return view('vegetabledetail',['vegetabledetail'=>$vegetabledetail]);
    }
    public function update_vegetable(Request $request, $id){
        $request->validate([
            'name'=>'required|min:5',
            'description'=>'required',
            'price'=>'required|integer|gt:0',
            'upload'=>'nullable|file|image|mimes:jpeg,jpg,png,webp',
        ]);

        $currentvegetable = Vegetable::findOrFail($id);
        $currentvegetable->name = $request->input('name');
        $currentvegetable->description = $request->input('description');
        $currentvegetable->price = $request->input('price');
        $currentvegetable->year = $request->input('year');

        if($request->file('upload')){
            $image=$request->file('upload');
            Storage::putFileAs('public/image', $image, $image->getClientOriginalName());
            $currentvegetable->upload = $image->getClientOriginalName();

            Vegetable::where('id','=', $id)->update([
                'name'=> $currentvegetable->name,
                'description'=>$currentvegetable->description,
                'price'=>$currentvegetable->price,
                'image' => $currentvegetable->upload,
            ]);
        }

        Vegetable::where('id','=', $id)->update([
            'name'=> $currentvegetable->name,
            'description'=>$currentvegetable->description,
            'price'=>$currentvegetable->price,
        ]);
        return redirect()->route('vegetable');
    }

    public function addcart(Request $request, $id){
       
        $vegetabledetail = Vegetable::find($id);

        $cart = session()->get('cartproduct'.Auth::user()->id);
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->input('quantity');
        }
        else {
            $cart[$id] = [
                'image' => $vegetabledetail->image,
                'name' => $vegetabledetail->name,
                'price' => $vegetabledetail->price,
                'description' => $vegetabledetail->description,
            ];
        }
        session()->put('cartproduct'.Auth::user()->id, $cart);
        return redirect()->route('indexcart');
    }

    public function indexcart(){
        $cart = session()->get('cartproduct'.Auth::user()->id);
        if($cart != NULL){
            session()->put('cartproduct'.Auth::user()->id, $cart);
        }
        return view('cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cartproduct'.Auth::user()->id);
        unset($cart[$id]);
        session()->put('cartproduct'.Auth::user()->id,$cart);
        return redirect()->route('indexcart');
    }

    public function success(){
        return view('success');
    }

}
