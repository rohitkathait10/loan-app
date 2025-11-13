<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;

class AdminAdvertisementController extends Controller
{
    public function index()
    {
        $ads = Advertisement::orderByRaw('(content_status = 1 OR image_status = 1) DESC')
            ->orderByDesc('id')
            ->get();

        return view('admin.ads.index', compact('ads'));
    }


    public function view($id)
    {
        $ad = Advertisement::findOrFail($id);
        return view('admin.ads.show', compact('ad'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = $request->only(['title', 'content', 'content_status', 'image_status']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ads', 'public');
        }

        Advertisement::create($data);

        return redirect()->back()->with('success', 'Advertisement created successfully.');
    }

    public function edit($id)
    {
        $ad = Advertisement::findOrFail($id);
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, $id)
    {
        $ad = Advertisement::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'content_status' => $request->has('content_status') ? 1 : 0,
            'image_status' => $request->has('image_status') ? 1 : 0,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('ads', 'public');
        }

        $ad->update($data);

        return redirect()->back()->with('success', 'Advertisement updated successfully.');
    }

    public function delete($id)
    {
        $ad = Advertisement::findOrFail($id);
        $ad->delete();

        return redirect()->back()->with('success', 'Advertisement deleted successfully.');
    }
}
