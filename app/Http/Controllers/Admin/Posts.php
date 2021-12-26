<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\Report;
use Auth;
use App\Traits\Offertrait;

class Posts extends Controller
{
    use Offertrait;
    public function posts()
    {
        $posts = Post::paginate(ADMIN_PAGINATE);
        return view('admin.posts', compact('posts'));
    }
    public function createPost()
    {
        return view('admin.createPost');
    }
    public function insertPost(PostRequest $data)
    {
        //TITLE
        $title = $this->filter_text($data->title);
        //content
        $content = $this->filter_text($data->content);
        //images
        $images = [];
        $data_image = $data->img;
        for($i = 0; $i < count($data_image); $i++){
            $image = $this->saveimage($data_image[$i], 'images/posts', 'consulta_' . $i);
            $images[] = ["img" => $image];
        }
        
        $final = json_encode($images);
        $post = Post::insert([
            'title' => $title,
            'content' => $content,
            'img' => $final,
        ]);
        if($post){
            return redirect()->back()->with('success', 'تم إضافة المنشور');
        }else{
            return redirect()->back()->with('error', 'فشل إضافة المنشور');
        }
    }

    public function post_show($id)
    {
        $data = Post::where("id", "=", $id)->get();
        return view("front.post.show", compact("data"));
    }
}
