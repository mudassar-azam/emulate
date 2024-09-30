<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller\Post;
use App\Models\Seller\PostImage;

class PostController extends Controller
{
    public function store(Request $request){

        $rules = [
            'post' => 'required',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'item_id' => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->getMessages() as $field => $messages) {
                $errors[] = [
                    'field' => $field,
                    'message' => $messages[0]
                ];
            }
        
            return response()->json(['success' => false, 'errors' => $errors], 422);
        }

        $data = $request->all();

        // later we will use auth id of logged in user
        $data['user_id'] = 3;

        $post = Post::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $destinationPath = public_path('post-images');
                $originalName = $image->getClientOriginalName();
                $uniqueName = time() . '_' . uniqid() . '_' . $originalName;
                $image->move($destinationPath, $uniqueName);
                PostImage::create([
                    'post_id' => $post->id,
                    'image_name' => $uniqueName,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Post created successfully!']);
    }
}
