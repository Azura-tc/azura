<?php

namespace App\Http\Controllers\Admin;

use App\Models\Social;

use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return inertia('Social/Index', ['socials' => Social::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Social/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSocialRequest $request)
    {
        $social = Social::create([...$request->all(), 'icon' => $request->file('icon')->store('socials', 'public')]);

        return to_route('admin.social.show', $social);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        return inertia('Social/Show', ['social' => $social]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        return inertia('Social/Form', ['social' => $social]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSocialRequest  $request
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocialRequest $request, Social $social)
    {
        $icon = $social->icon;
        if($request->file('icon') instanceof UploadedFile){
            $icon = $request->file('icon')->store('socials', 'public');
            if($icon !== $social->icon && Storage::disk('public')->exists($icon))
                Storage::disk('public')->delete($social->icon);
        }

        $social->update([...$request->all(), 'icon' => $icon]);

        return to_route('admin.social.show', $social);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        $social->delete();

        return back();
    }
}
