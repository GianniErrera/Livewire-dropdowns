<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Comment;

class Timeline extends Component
{
    use WithPagination;

    public $body;
    public $attached_image;
    public $comment;

    protected $listeners = ['refreshComponent' => '$refresh'    ];

    protected $rules = [
        'body' => 'required|max:160',
    ];

    public function test()
    {
        dd('OKKKKKKK');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
    }

    public function render()
    {
        return view('livewire.timeline', ['comments' => Comment::latest()->cursorPaginate(10)]);
    }
}
