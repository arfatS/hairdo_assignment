<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\User;

class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $websites = Website::all();
        }
        if(auth()->user()->role == 'seller'){
            $websites = Website::where('seller_id', auth()->user()->id)->get();
        }
        if(auth()->user()->role == 'buyer'){
            $websites = Website::where('approved', 1)->get();
        }
        return view('websites.index', compact('websites'));
    }

    public function view($id)
    {
        $website = Website::find($id);
        $website->seller = User::find($website->seller_id);

        return view('websites.view', compact('website'));
    }

    public function approve($id)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/home');
        }

        $website = Website::find($id);
        $website->approved = true;
        $website->save();

        return redirect('/websites')->with('success', 'Website ' . $website->name . ' has been approved');

    }

    public function add()
    {
        return view('websites.add');
    }

    public function store(Request $request)
    {
        Website::create([
            'seller_id' => auth()->user()->id,
            'name' => $request->name,
            'url' => $request->url,
            'domain_authority' => $request->domain_authority,
            'page_authority' => $request->page_authority,
            'guest_post_price' => $request->guest_post_price
        ]);

        return redirect('/websites')->with('success', 'Website added successfully');
    }


    public function edit($id)
    {
        $website = Website::find($id);
        return view('websites.edit', compact('website'));
    }

    public function update(Request $request, $id)
    {
        Website::find($id)->update($request->all());
        return redirect('/websites')->with('success', 'Website updated successfully');
    }

    public function delete($id)
    {
        Website::find($id)->delete();
        return back();
    }
}
