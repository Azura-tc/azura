<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;

use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Section::first()->image);
        return inertia('Section/Index', ['sections' => Section::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Section/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSectionRequest $request)
    {
        // dd($request->all());
        $section = Section::create([...$request->all(), 'image' => ($request->file('image') instanceof UploadedFile) ? $request->file('image')->store('sections', 'public') : null]);
        // if($request->has('image') && $request->file('image') instanceof UploadedFile)
        //     $section->image()->save(new Image(['path' => $request->image->store('sections', 'public')]));

        return to_route('admin.section.show', $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return inertia('Section/Show', ['section' => $section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return inertia('Section/Form', ['section' => $section]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionRequest  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $image = $section->image;
        if($request->file('image') instanceof UploadedFile){
            $image = $request->file('image')->store('sections', 'public');
            if($image !== $section->image && Storage::disk('public')->exists($image))
                Storage::disk('public')->delete($section->image);
        }

        $section->update([...$request->all(), 'image' => $image]);

        return to_route('admin.section.show', $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();

        return back();
    }
}
