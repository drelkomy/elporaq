<?php

namespace App\Http\Controllers;

use App\Models\InvestmentOpportunity;
use App\Models\InvestmentCategory;
use App\Models\Link;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvestmentOpportunityController extends Controller
{
    public function index(Request $request)
    {
        $query = InvestmentOpportunity::query();
    
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
    
        $opportunities = $query->paginate(10);
        $categories = InvestmentCategory::all();
        $links = Link::all();
        return view('investment-opportunities.index', compact('opportunities', 'categories', 'links'));
    }

    public function allInvest(Request $request)
    {
        $query = InvestmentOpportunity::query();
    
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        $services=Service::all();
        $opportunities = $query->paginate(12);
        $categories = InvestmentCategory::all();
        $links = Link::all();
        $investmentCategories = InvestmentCategory::all();
        
        return view('investment-opportunities.allInvest', compact('opportunities', 'categories', 'links', 'investmentCategories','services'));
    }

    public function create()
    {
        $categories = InvestmentCategory::all();
        return view('investment-opportunities.create', compact('categories'));
    }
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:400',
        'description' => 'required',
        'category_id' => 'required|exists:investment_categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'project_features' => 'nullable',
        'project_products' => 'nullable',
        'production_process' => 'nullable',
        'required' => 'nullable',
        'project_ser' => 'nullable',
        'financial_indicators' => 'nullable',
    ]);

    $imagePath = $request->hasFile('image') 
        ? $request->file('image')->getClientOriginalName() 
        : null;

    if ($request->hasFile('image')) {
        $request->file('image')->move(public_path('images/invest'), $imagePath);
    }

    InvestmentOpportunity::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'category_id' => $request->input('category_id'),
        'image' => $imagePath,
        'project_features' => $request->input('project_features'),
        'project_products' => $request->input('project_products'),
        'production_process' => $request->input('production_process'),
        'required' => $request->input('required'),
        'project_ser' => $request->input('project_ser'),
        'financial_indicators' => $request->input('financial_indicators'),
    ]);

    return redirect()->route('investment-opportunities.index')
                     ->with('success', 'تم إضافة الفرصة الاستثمارية بنجاح.');
}


public function edit($id)
{
    $investmentOpportunity = InvestmentOpportunity::findOrFail($id);
    $categories = InvestmentCategory::all();
    return view('investment-opportunities.edit', compact('investmentOpportunity', 'categories'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:400',
        'description' => 'required',
        'category_id' => 'required|exists:investment_categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'project_features' => 'nullable',
        'project_products' => 'nullable',
        'production_process' => 'nullable',
        'required' => 'nullable',
        'project_ser' => 'nullable',
        'financial_indicators' => 'nullable',
    ]);

    $opportunity = InvestmentOpportunity::findOrFail($id);
    $opportunity->title = $request->input('title');
    $opportunity->description = $request->input('description');
    $opportunity->category_id = $request->input('category_id');

    if ($request->hasFile('image')) {
        if ($opportunity->image) {
            $oldImagePath = public_path('images/invest/' . $opportunity->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imagePath = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/invest'), $imagePath);
        $opportunity->image = $imagePath;
    }

    $opportunity->project_features = $request->input('project_features');
    $opportunity->project_products = $request->input('project_products');
    $opportunity->production_process = $request->input('production_process');
    $opportunity->required = $request->input('required');
    $opportunity->project_ser = $request->input('project_ser');
    $opportunity->financial_indicators = $request->input('financial_indicators');
    $opportunity->save();

    return redirect()->route('investment-opportunities.index')
                     ->with('success', 'تمت تحديث الفرصة الاستثمارية بنجاح');
}


    public function destroy($id)
    {
        $opportunity = InvestmentOpportunity::findOrFail($id);

        if ($opportunity->image) {
            $imagePath = public_path('images/invest/' . $opportunity->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $opportunity->delete();

        return redirect()->route('investment-opportunities.index')
                         ->with('success', 'تم حذف الفرصة الاستثمارية بنجاح');
    }

    public function show($id)
    {
        $services=Service::all();
        $opportunities = InvestmentOpportunity::latest()->take(5)->get();
        $links = Link::all();
        $investmentCategories = InvestmentCategory::all();    
        $investmentOpportunity = InvestmentOpportunity::findOrFail($id);
        return view('investment-opportunities.show', compact('investmentOpportunity', 'links', 'investmentCategories', 'opportunities','services'));
    }

    public function byCategory($id)
    {
        $opportunities = InvestmentOpportunity::where('category_id', $id)->paginate(10);
        $categories = InvestmentCategory::all();
        return view('investment-opportunities.index', compact('opportunities', 'categories'));
    }
}
