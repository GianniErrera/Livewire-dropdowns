<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Livewire\WithFileUploads;

class PublishComment extends Component
{
    public $body;
    public $attached_image;
    public $image_path;


    use WithFileUploads;

/*     protected $listeners = [
        'refreshSelf' => '$refresh'
        ]; */

    protected $rules = [
        'body' => 'required|max:160',
    ];



    public function comment()
    {

        $validatedData = $this->validate();
        $comment = new Comment();
        $comment->body = $this->body;
        if($this->attached_image)
        {
        $this->image_path = $this->attached_image->store('images');

        $comment->attached_image = $this->image_path;
        }
        $comment->save();

        // $this->emitSelf('refreshSelf'); ->questo non serve e non fa funzionare il messaggio flash
        $this->emitTo('timeline', 'andrea');
        $this->reset(['attached_image', 'body']);
        session()->flash('message', 'Comment added successfully 😁');
    }


    public function render()
    {
        return view('livewire.publish-comment');
    }
}
