<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spin;
use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Support\Str;

class SpinWheelController extends Controller
{
    public function useSpin(Request $request)
    {

        $user = $request->user();
        if (!$user->hasRole('Retailer')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $spin = Spin::firstOrCreate(
            ['user_id' => $user->id, 'spin_date' => now()->format('Y-m-d')],
            ['free_spins' => 3, 'purchased_spins' => 0]
        );


        if ($spin->free_spins > 0) {

            $spin->free_spins -= 1;
            $spin->save();

            $amountWon = 100;
            $wallet = Wallet::firstOrCreate(['user_id' => $user->id]);
            $wallet->balance += $amountWon;
            $wallet->save();


            Transaction::create([
                'user_id' => $user->id,
                'transaction_id' => 'speedforce-' . now()->year . '-' . Str::random(9),
                'amount' => $amountWon,
                'source' => 'spin',
                'type' => 'addition'
            ]);

            return response()->json(['message' => 'Spin successful', 'amount_won' => $amountWon], 200);
        }

        return response()->json(['message' => 'No free spins available'], 403);
    }
    public function buySpin(Request $request)
    {
        $user = $request->user();
        if (!$user->hasRole('Retailer')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $spin = Spin::where('user_id', $user->id)
            ->whereDate('spin_date', now()->format('Y-m-d'))
            ->first();

        if (!$spin || $spin->free_spins > 0) {
            return response()->json(['message' => 'Please use all free spins first'], 403);
        }

      
        $wallet = Wallet::firstOrCreate(['user_id' => $user->id]);

        if ($wallet->balance < 200) {
            return response()->json(['message' => 'Insufficient balance'], 403);
        }

        $wallet->balance -= 200;
        $wallet->save();


        $spin->purchased_spins += 1;
        $spin->save();


        Transaction::create([
            'user_id' => $user->id,
            'transaction_id' => 'speedforce-' . now()->year . '-' . Str::random(9),
            'amount' => 200,
            'source' => 'spin purchase',
            'type' => 'deduction'
        ]);

        return response()->json(['message' => 'Spin purchased successfully'], 200);
    }
    public function spinHistory(Request $request)
    {
        $user = $request->user();
        if (!$user->hasRole('Retailer')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $spins = Spin::where('user_id', $user->id)->get();
        $transactions = Transaction::where('user_id', $user->id)->get();

        return response()->json([
            'spins' => $spins,
            'transactions' => $transactions
        ], 200);
    }
    public function adminSpinHistory(Request $request)
    {
        $user = $request->user();
        if (!$user->hasRole('Admin')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $spins = Spin::all();
        $transactions = Transaction::all();

        return response()->json([
            'spins' => $spins,
            'transactions' => $transactions
        ], 200);
    }
}
