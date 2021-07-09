<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Comment;

class Timeline extends Component
{
    use WithPagination;


    protected $listeners = ['refreshComponent' => '$refresh', 'resetPagination'];



    public function delete(Comment $comment)
    {
        $comment->delete();
    }

    public function resetPagination()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.timeline', ['comments' => Comment::latest()->paginate(20)]);
    }
}
