<?php

namespace App\Livewire\Editor;

use App\Models\CV;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCV extends Component
{
	use WithFileUploads;

	public $email;
	public $fullName;
	public $phone;
	public $self_description;
	public $profile_picture;
	public $degrees    = [];
	public $skills     = [];
	public $experience = [];
	public $languages  = [];

	protected $messages = [
		'required' => 'Acest câmp este obligatoriu.',
		'email'    => 'Adresa de email nu este validă.',
		'array'    => 'Trebuie să introduceți cel puțin un element.',
		'min'      => 'Trebuie să introduceți cel puțin un element.',
	];


	public function mount() {
	}

	public function save() {
		$this->validate([
			'email'            => 'required|email',
			'fullName'         => 'required',
			'phone'            => 'required',
			'self_description' => 'required',
			'degrees'          => 'present|array|min:1',
			'skills'           => 'present|array|min:1',
			'languages'        => 'present|array|min:1',
		]);

		$id = CV::create([
			'email'                   => $this->email,
			'nume'                    => $this->fullName,
			'telefon'                 => $this->phone,
			'descriere'               => $this->self_description,
			'experienta_educationala' => json_encode($this->degrees),
			'competente'              => json_encode($this->skills),
			'experienta_profesionala' => json_encode($this->experience),
			'limbi_cunoscute'         => json_encode($this->languages),
		])->id;

		if ($this->profile_picture) {
			$path = $this->profile_picture->store('public/photos');
			if ($path) {
				$old_path = CV::where('id', $id)->first()->poza;
				if ($old_path) {
					@unlink(storage_path('app/' . $old_path));
				}
				CV::where('id', $id)->update([
					'poza' => $path,
				]);
				$this->profile_picture = $path;
			}
		}

		session()->flash('message', 'CV-ul a fost actualizat cu succes.');
		return redirect()->route('cv.edit', ['id' => $id]);
	}

	public function addEducation() {
		$this->degrees[] = [];
	}

	public function removeEducation($index) {
		unset($this->degrees[$index]);
		$this->degrees = array_values($this->degrees);
	}

	public function addSkill() {
		$this->skills[] = [];
	}

	public function removeSkill($index) {
		unset($this->skills[$index]);
		$this->skills = array_values($this->skills);
	}

	public function addExperience() {
		$this->experience[] = [];
	}

	public function removeExperience($index) {
		unset($this->experience[$index]);
		$this->experience = array_values($this->experience);
	}

	public function addLanguage() {
		$this->languages[] = [];
	}

	public function removeLanguage($index) {
		unset($this->languages[$index]);
		$this->languages = array_values($this->languages);
	}

    public function render()
    {
        return view('livewire.editor.create-cv');
    }
}
