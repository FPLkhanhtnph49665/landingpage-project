<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Models\Child;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::withTrashed()->paginate(20);
        return view('admin.children.index', compact('children'));
    }

    public function create()
    {
        return view('admin.children.create');
    }

    public function store(StoreChildRequest $request)
    {
        $data = $request->validated();
        $data['uuid'] = \Illuminate\Support\Str::uuid();
        Child::create($data);
        return redirect()->route('admin.children.index');
    }

    public function show(Child $child)
    {
        return view('admin.children.show', compact('child'));
    }

    public function edit(Child $child)
    {
        return view('admin.children.edit', compact('child'));
    }

    public function update(UpdateChildRequest $request, Child $child)
    {
        $child->update($request->validated());
        return redirect()->route('admin.children.index');
    }

    public function destroy(Child $child)
    {
        $child->delete();
        return back();
    }

    public function restore($id)
    {
        $child = Child::withTrashed()->findOrFail($id);
        $child->restore();
        return back();
    }
}
