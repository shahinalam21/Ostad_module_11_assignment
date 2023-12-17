<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Retrieve sale transaction history using Query Builder
        $transactions = DB::table('transactions')
            ->select('id', 'amount', 'product_id', 'created_at')
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        // Logic to populate data for the create view, if needed
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'product_id' => 'required|exists:products,id',
        ]);

        // Insert a new transaction using Query Builder
        DB::table('transactions')->insert([
            'amount' => $request->input('amount'),
            'product_id' => $request->input('product_id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction recorded successfully.');
    }
}
