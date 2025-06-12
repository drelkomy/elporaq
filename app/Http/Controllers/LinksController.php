<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Routing\Controller;

class LinksController extends Controller
{
    public function index(Request $request)
    {
        $query = Link::query();
    
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where('link_name', 'like', "%{$search}%")
                  ->orWhere('icon_name', 'like', "%{$search}%");
        }
    
        $links = $query->paginate(10); // عرض 10 روابط في كل صفحة
        return view('links.index', compact('links'));
    }
    
    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link_name' => 'required|string|max:255',
            'icon_name' => 'required|string|max:255',

        ]);

        Link::create([
            'link_name' => $request->input('link_name'),
            'icon_name' => $request->input('icon_name'),

        ]);

        return redirect()->route('links.index')->with('success', 'تم إضافة الرابط بنجاح!');
    }

    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        $request->validate([
            'link_name' => 'required|string|max:255',
            'icon_name' => 'required|string|max:255',

        ]);

        $link->update([
            'link_name' => $request->input('link_name'),
            'icon_name' => $request->input('icon_name'),

        ]);

        return redirect()->route('links.index')->with('success', 'تم تحديث الرابط بنجاح!');
    }

    public function destroy(Link $link)
    {
        $link->delete();

        return redirect()->route('links.index')->with('success', 'تم حذف الرابط بنجاح!');
    }
}
