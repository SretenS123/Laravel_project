<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $festivals = Festival::with("user")->get();
            return view('festivals.index',
            [
                'festivals' => Festival::with('user')->latest()->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string|max:255',
           'price' => 'required|numeric',
           'image' => 'required|string'
       ]);
        $request->user()->festivals()->create($validated);
        $request->user()->roles()->create('admin');
        return redirect(route('festivals.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival) : View
    {
        $this->authorize('update', $festival);

        return view('festivals.edit', [
            'festival' => $festival,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival) : RedirectResponse
    {
        $this->authorize('update', $festival);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|string'
        ]);

        $festival->update($validated);

        return redirect(route('festivals.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival) : RedirectResponse
    {
        $this->authorize('delete', $festival);

        $festival->delete();

        return redirect(route('festivals.index'));
    }
}
