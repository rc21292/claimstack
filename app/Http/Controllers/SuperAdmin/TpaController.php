<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Tpa;
use Illuminate\Http\Request;

class TpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter_search = $request->search;
        $tpas = Tpa::query();
        if($filter_search){
            $tpas->where('company', 'like','%' . $filter_search . '%');
        }
        $tpas = $tpas->orderBy('id', 'desc')->paginate(20);
        return view('super-admin.tpa.manage',  compact('tpas', 'filter_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.tpa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
        'company'                 => 'required|string',
        ];

    $messages = [
        'company.required'             => 'Please enter Company Name',
    ];

    $this->validate($request, $rules, $messages);

    $tpa                     =   Tpa::create($request->all());

    return redirect()->route('super-admin.tpa.index')->with('success', 'TPA created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tpa = Tpa::find($id);
        return view('super-admin.tpa.edit', compact('tpa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'company'                 => 'required|string',
            ];

        $messages = [
            'company.required'             => 'Please enter Company Name',
        ];

        $this->validate($request, $rules, $messages);

        $tpa                     =   Tpa::find($id)->update($request->all());

        return redirect()->route('super-admin.tpa.index')->with('success', 'TPA updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tpa                     =   Tpa::find($id)->delete();

        return redirect()->route('super-admin.tpa.index')->with('success', 'TPA deleted successfully');
    }
}
