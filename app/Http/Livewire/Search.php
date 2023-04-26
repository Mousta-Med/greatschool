<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Search extends Component
{
    public $students;
    public $search;
    public function render()
    {
        $data = User::where('role', 'student')->where('class_id', Auth::user()->class_id)->latest();
        if ($this->search) {
            $data->where('name', 'like', '%' . $this->search . '%');
        }
        $this->students = $data->get();
        return view('livewire.search', ['students' => $this->students]);
    }
}
