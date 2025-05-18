<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Item;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('item')->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $items = Item::where('stock', '>', 0)->get();
        return view('borrows.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'borrower_name' => 'required|string|max:100',
            'quantity' => 'required|integer|min:1',
            'borrow_date' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($request->quantity > $item->stock) {
            return back()->withErrors(['quantity' => 'Jumlah pinjam melebihi stok tersedia.']);
        }

        $item->stock -= $request->quantity;
        $item->save();

        Borrow::create([
            'item_id' => $request->item_id,
            'borrower_name' => $request->borrower_name,
            'quantity' => $request->quantity,
            'borrow_date' => $request->borrow_date,
            'status' => 'borrowed',
        ]);

        return redirect()->route('borrows.index')->with('success', 'Peminjaman berhasil.');
    }

    public function return($id)
    {
        $borrow = Borrow::findOrFail($id);

        if ($borrow->status === 'returned') {
            return back()->withErrors(['status' => 'Barang sudah dikembalikan.']);
        }

        $borrow->status = 'returned';
        $borrow->save();

        $item = Item::findOrFail($borrow->item_id);
        $item->stock += $borrow->quantity;
        $item->save();

        return redirect()->route('borrows.index')->with('success', 'Barang berhasil dikembalikan.');
    }

    public function destroy($id)
    {
        Borrow::destroy($id);
        return redirect()->route('borrows.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
