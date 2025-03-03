<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankomatController extends Controller
{
    public function getBalance(Request $request)
    {
        $user = $request->user();
        $account = Account::where('user_id', $user->id)->first();

        if (!$account) {
            return response()->json(['message' => 'Hesab tapılmadı'], 404);
        }

        return response()->json([
            'balance' => $account->balance
        ]);
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1'
        ]);

        $account = Account::where('user_id', Auth::id())->first();

        if (!$account) {
            return response()->json(['message' => 'Balans tapılmadı'], 404);
        }

        $account->balance += $request->amount;
        $account->save();

        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'status' => 'success'
        ]);

        return response()->json([
            'message' => 'Balans uğurla artırıldı',
            'transaction' => $transaction,
            'balance' => $account->balance
        ]);
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();

        if (!$account) {
            return response()->json(['message' => 'Hesab tapılmadı'], 404);
        }

        $amount = $request->input('amount');

        if ($account->balance < $amount) {
            return response()->json(['message' => 'Balansınızda kifayət qədər vəsait yoxdur'], 400);
        }

        $account->balance -= $amount;
        $account->save();

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'status' => 'success'
        ]);

        $change = $this->getMinimumBills($amount);

        return response()->json([
            'message' => 'Çıxarış uğurla tamamlandı',
            'change' => $change,
            'remaining_balance' => 'Balansınız: ' . $account->balance . 'AZN',
            'transaction' => $transaction
        ]);
    }

    private function getMinimumBills($amount)
    {
        $bills = [200, 100, 50, 20, 10, 5, 1];
        $change = [];

        foreach ($bills as $bill) {
            if ($amount >= $bill) {
                $count = intdiv($amount, $bill);
                $amount -= $count * $bill;

                $change[$bill] = $count;
            }
        }

        if ($amount > 0) {
            return response()->json(['message' => 'Qaytarılacaq məbləği uyğun əskinaslarla ödəyə bilmədik'], 400);
        }

        return $change;
    }



    public function getTransactions(Request $request)
    {
        $user = $request->user();

        $transactions = Transaction::where('user_id', $user->id)->get();

        if ($transactions->isEmpty()) {
            return response()->json(['message' => 'Əməliyyat tapılmadı'], 404);
        }

        return response()->json($transactions);
    }

    public function deleteTransaction($id)
    {
        if (!auth()->user()->isAdmin()) {
            return response()->json(['message' => 'Silmək üçün İcazəniz yoxdur'], 403);
        }

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Əməliyyat tapılmadı'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Əməliyyat silindi']);
    }
}
