<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $temp = time() . '.' . $request->postFile->extension();

        if ($request->postFile->storeAs('temp', $temp)) {
            $text = $request->postText;

            $user = auth()->user()->posts()->create([
                'text' => $text,
            ]);

            $source_file = storage_path('app/temp/' . $temp);
            $target_name = $user->id;
            $target_dir = public_path('uploads/');

            $webp = Image::make($source_file)->encode('webp');
            $webp->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $webp->save($target_dir . $target_name . '.webp');

            $jpeg = Image::make($source_file)->encode('jpeg');
            $jpeg->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $jpeg->save($target_dir . $target_name . '.jpg');

            File::delete($source_file);

            $user->published = true;
            $user->published_at = now();
            $user->save();

            return back()
                ->with('success', 'You have successfully upload file.');
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
