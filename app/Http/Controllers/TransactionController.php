<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index($id) {
        return view('transaction.index',[
            'title' => "Beli",
            'active' => "home",
            'product' => Product::find($id),
            'ongkir' => 25000,
        ]);
    }

    public function postData(Request $request) {
        
        $validatedData = $request->validate([
            'total' => 'required',
            'address' => 'required',
            'status' => 'required',
            'upload' => 'required|file|max:2048',
        ]);

        if ($request->file('upload')) {
            $validatedData['upload'] = $request->file('upload')->store('transaction-image');
        }


        $validatedData['user_id'] = auth()->user()->id;
        $createTransaction = Transaction::create($validatedData);

        
        $details = [
            "product_id" => $request->product_id,
            "price" => $request->price,
            'total_price' => $request->total,
            'transaction_id' => $createTransaction->id,
            'qty' => $request->qty
        ];

        TransactionDetail::create($details);
        return redirect('/');
    }
}
