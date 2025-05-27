<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Traits\Searchable;
use Illuminate\Http\Response;

class OrganizationTypeController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $query = Organization::query();
        $this->search($query,['name']);
        $Organization = $query->paginate(10);
        return view("admin.Organization-type.index",compact("Organization"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.Organization-type.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','max:50','unique:industry_types,name'],
        ]);

        $type = new Organization();
        $type->name = $request->name;
        $type->save();

        Notify::createdNotification();
        return to_route('admin.organization-types.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $organization = Organization::findOrFail($id);
        return view('admin.Organization-type.edit',compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required','max:50','unique:industry_types,name,'.$id],
        ]);

        $type=Organization::findOrFail($id);
        $type->name = $request->name;
        $type->save();

        Notify::updatedNotification();
        return to_route('admin.organization-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):Response
    {
        try{
            Organization::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'],200);
        }
        catch(\Exception $e){
            logger($e);
            return response(['message' => 'error'],500);
        }
    }
}
