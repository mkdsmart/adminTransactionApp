<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class TransactionController extends Controller
{


    public function viewtransaction(Request $request){
        $clients = Client::all();
        // dd($request);


        if((($request->status =="all") ||($request->status =="")) && (($request->withdrawal_method== "all") || ($request->withdrawal_method== ""))){
            $transactions = Transaction::paginate(10);
            $filters = ['all','all'];
        }

        elseif($request->status !="all" && $request->withdrawal_method== "all"){
            // dd($request->status !=null && $request->withdrawal_method== null);
            $transactions = Transaction::where('status', $request->status)->paginate(10);
            $filters = [$request->status, 'all'];
            // dd($transactions == null);
        }
        elseif($request->status =="all" && $request->withdrawal_method!= "all"){
            $transactions = Transaction::where('withdrawal_method', $request->withdrawal_method)->paginate(10);
            $filters = ['all', $request->withdrawal_method];
        }
        else{
            $transactions = Transaction::where('status', $request->status)->where('withdrawal_method', $request->withdrawal_method)->paginate(10);
            $filters = [$request->status, $request->withdrawal_method];
        }




        return view('/transactiontable', with(['clients'=>$clients,'transactions'=>$transactions, 'filters'=> $filters] ));
    }

    public function viewclient(){
        $clients = Client::paginate(10);

        return view('/clientinfo', with(['clients'=>$clients] ));

    }

    public function add(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);


        $user->save();

        return redirect(route('dashboard', absolute: false));
    }

    public function modify(Request $request){
        $transaction = Transaction::find($request->id);
        if($request->status != $transaction->status ){
            $transaction->status = $request->status;
            $transaction->save();
        }

        $clients = Client::all();
        $transactions = Transaction::paginate(10);

        return view('/transactiontable', with(['clients'=>$clients,'transactions'=>$transactions] ));

    }


}
