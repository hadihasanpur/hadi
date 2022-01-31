<?php
namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;


class Posts extends Component
{
   use WithFileUploads;

   public $title;
   public $body;
   public $image;
   public $postId = null;
   public $newImage;

   public $showModalForm = false;

   public function showCreatePostModal()
   {
      $this->showModalForm = true;
   }

   public function storePost()
    {
        $this->validate([
          'title' =>'required',
          'body'  => 'required',
          'image' => 'required|image|max:1024'
      ]);

        $image_name = $this->image->getClientOriginalName();
        $this->image->storeAs('public/photos/', $image_name);
        $post =new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $this->title;
        $post->slug = Str::slug($this->title);
        $post->body = $this->body;
        $post->image = $image_name;
        $post->save();
        $this->reset();
        session()->flash('flash.banner', 'Post created Successfully');
    }



    public function render()
    {
        return view('livewire.posts');
    }
}
