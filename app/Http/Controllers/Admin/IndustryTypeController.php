<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryType;
use App\Services\Notify;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Pagination\Paginator;
use App\Traits\Searchable;


class IndustryTypeController extends Controller
{
   use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {

        //dd($request->search);
        $query = IndustryType::query();
        $this->search($query,['name']);
        $industryTypes = $query->paginate(10);
        return view("admin.Industry-type.index", compact("industryTypes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view("admin.Industry-type.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required','max:50','unique:industry_types,name'],
        ]);

        $type = new IndustryType();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotification();
        return to_route('admin.industry-types.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $industryTypes = IndustryType::findOrFail($id);
        return view('admin.Industry-type.edit', compact('industryTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => ['required','max:50','unique:industry_types,name,'.$id],
        ]);

        $type=IndustryType::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotification();
        return to_route('admin.industry-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try{
            IndustryType::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'],200);
        }
        catch(\Exception $e){
            logger($e);
            return response(['message' => 'error'],500);
        }
    }
}
