<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function viewtransaction(){

        // dd('helo');
        $clients = Client::all();
        $transactions = Transaction::all();

        return view('/transactiontable', with(['clients'=>$clients,'transactions'=>$transactions] ));
    }
}
