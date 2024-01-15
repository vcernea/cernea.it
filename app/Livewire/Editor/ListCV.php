<?php

namespace App\Livewire\Editor;

use Livewire\Component;

class ListCV extends Component
{
    public function render()
    {
        $cv = \App\Models\CV::all();
		return view('livewire.editor.list-cv')->extends('layouts.blankLayout')->with('title', 'List all CVs')->with('cvs', $cv);
    }
}
