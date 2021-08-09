<?php

namespace App\Http\Controllers;

use App\Http\Responses\BadgeStoreResponse;
use App\Http\Responses\BadgeUpdateResponse;
use App\Models\Country;
use App\Repositories\Badge\BadgeInterface;
use Illuminate\Http\Request;
use App\Models\Badge;
use App\Models\Role;


class BadgeController extends Controller
{
    protected $repository;

    public function __construct(BadgeInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {        
        list($badges, $role) = $this->repository->getBadgesAndRole('freelancer');
        return view('admin.default.freelancer_badges.index', compact('badges','role'));        
    }

    public function client_badges_index()
    {    
        list($badges, $role) = $this->repository->getBadgesAndRole('client');
        return view('admin.default.client_badges.index', compact('badges','role'));
    
    }

    public function create()
    {
        // $role = $this->repository->getBadgesAndRole('Freelancer');
        // return view('admin.default.freelancer_badges.create', compact('role'));
    }

    public function client_badges_create()
    {
        // $role = $this->repository->getBadgesAndRole('Client');
        // return view('admin.default.client_badges.create', compact('role'));
    }

    public function store(Request $request)
    {
        return new BadgeStoreResponse($request, $this->repository);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {        
        $badge = Badge::findOrFail(decrypt($id));
        return view('admin.default.freelancer_badges.edit', compact('badge'));        
    }

    public function client_badges_edit($id)
    {
        
        $badge = Badge::findOrFail(decrypt($id));
        return view('admin.default.client_badges.edit', compact('badge'));
       
    }

    public function update(Request $request, $id)
    {
        $badge = Badge::findOrFail($id);
        
        $badge->name = $request->name;
        $badge->type = $request->type;
        $badge->value = $request->value;        

        if($request->has('icon')) {
            $badge->icon = $request->file('icon')->store('uploads/badge_icon');
        }

        $badge->save();

        flash(__('New Badge has been updated successfully!'))->success();
        if ($request->role_id == "freelancer") {
            return redirect()->route('badges.index');
        }
        if ($request->role_id == "client") {
            return redirect()->route('client_badges_index');
        }
        
    }

    public function destroy($id)
    {
        $badge = Badge::destroy($id);        
        flash('Badge has been deleted successfully')->success();
        return back();
    }
}
