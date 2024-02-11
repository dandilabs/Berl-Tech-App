<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index',[
            'projects' => Project::with('users')->latest()->get()
        ]);
    }

    public function detail(string $id){
        $detail_project = Project::findOrFail($id);
        return view('projects.detail', compact('detail_project'));
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
        $this->validate($request, [
            'name'          => 'required | min:3 | unique:projects',
            'deadline'      => 'required',
            'publish_date'  => 'required',
            'image'         => 'required',
            'desc'          => 'required'
        ]);

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();

        $data = Project::create([
            'name'        => $request->name,
            'deadline'    => $request->deadline,
            'publish_date'=> $request->publish_date,
            'desc'        => $request->desc,
            'image'       => 'public/uploads/projects/' . $new_image,
            'slug'        => Str::slug($request->judul),
            'users_id'    => Auth::id(),
        ]);

        $image->move('public/uploads/projects/', $new_image);
        return redirect()->route('project.index')->with('success', 'Project berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Project::findOrFail($id);
        return view('projects.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name'          => 'required | min:3',
            'deadline'      => 'required',
            'publish_date'  => 'required',
            'desc'          => 'required'
        ]);

        $data = Project::findOrFail($id);
        if($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/projects/', $new_image);
            $post_data =[
            'name'        => $request->name,
            'deadline'    => $request->deadline,
            'publish_date'=> $request->publish_date,
            'desc'        => $request->desc,
            'image'       => 'public/uploads/projects/' . $new_image,
            'slug'        => Str::slug($request->judul),
            ];
        } else {
            $post_data =[
                'name'        => $request->name,
                'deadline'    => $request->deadline,
                'publish_date'=> $request->publish_date,
                'desc'        => $request->desc,
                'slug'        => Str::slug($request->judul),
            ];
        }

        $data->update($post_data);
        return redirect()->route('project.index')->with('success', 'Project berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project berhasil didelete');
    }
}
