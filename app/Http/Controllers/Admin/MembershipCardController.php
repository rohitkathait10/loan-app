<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipCard;

class MembershipCardController extends Controller
{

    public function index()
    {
        $cards = MembershipCard::all();
        $validFrom = now()->format('d/m/Y');
        $validTo = now()->addMonths(6)->format('d/m/Y');

        return view('admin.membership-card', compact('cards', 'validFrom', 'validTo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'card_id' => 'required|exists:membership_cards,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'original_price' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'tenure' => 'required|integer|min:1',
        ]);

        $card = MembershipCard::findOrFail($request->card_id);

        $card->update([
            'name' => $request->name,
            'price' => $request->price,
            'original_price' => $request->original_price,
            'type' => $request->type,
            'tenure' => $request->tenure,
        ]);

        return redirect()->back()->with('success', 'Membership card updated successfully!');
    }
}
