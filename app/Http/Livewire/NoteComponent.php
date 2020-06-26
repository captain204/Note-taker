<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Note;
use Validator;


class NoteComponent extends Component
{

    public $note, $title, $body, $note_id;
    public $updateMode = false;
    
    
    public function render()
    {
        $this->note = Note::all();
        return view('livewire.notes.component');
    }

    
    private function resetInput()
    {
        $this->title = null;
        $this->body = null;
    }



    public function updated($field)
    {
        $this->validateOnly($field, [
            'title' => 'min:6',
            'body' => 'min:6',
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required|min:6',
            'body' => 'required|min:6',
        ]);

        Note::create($validatedData);

        $this->resetInput();
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $this->note_id = $id;
        $this->title = $note->title;
        $this->body = $note->body;
        $this->updateMode = true;
    }

    
    public function update()
    {
        $this->validate([
            'note_id' => 'required|numeric',
            'title' => 'required|min:5',
            'body' => 'required'
        ]);

        if ($this->note_id) {
            $note = Note::find($this->note_id);
            $note->update([
                'title' => $this->title,
                'body' => $this->body
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }
   }


   public function destroy($id)
   {
       if ($id) {
           $note = Note::where('id', $id);
           $note->delete();
       }
   }





}
