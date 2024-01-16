<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use mikehaertl\wkhtmlto\Pdf;

class Editor extends Controller {
	public function index() {
		return view('editor.edit');
	}

	public function list() {
		return view('editor.list');
	}

	public function create() {
		return view('editor.create');
	}

	public function preview($id) {
		$cv                            = \App\Models\CV::where('id', $id)->first();
		$cv['experienta_educationala'] = json_decode($cv['experienta_educationala'], true);
		$cv['competente']              = json_decode($cv['competente'], true);
		$cv['experienta_profesionala'] = json_decode($cv['experienta_profesionala'], true);
		$cv['limbi_cunoscute']         = json_decode($cv['limbi_cunoscute'], true);
		$cv['poza']                    = "data:image/jpeg;base64," . base64_encode(file_get_contents(storage_path() . '/app/' . $cv['poza']));
		return view('editor.preview')->with(['cv' => $cv, 'id' => $id, 'download' => false]);
	}

	public function show() {
		return view('editor.home');
	}

	public function download($id) {
		$cv                            = \App\Models\CV::where('id', $id)->first();
		$cv['experienta_educationala'] = json_decode($cv['experienta_educationala'], true);
		$cv['competente']              = json_decode($cv['competente'], true);
		$cv['experienta_profesionala'] = json_decode($cv['experienta_profesionala'], true);
		$cv['limbi_cunoscute']         = json_decode($cv['limbi_cunoscute'], true);
		$cv['poza']                    = "data:image/jpeg;base64," . base64_encode(file_get_contents(storage_path() . '/app/' . $cv['poza']));

		$html = view('editor.pdf')->with(['cv' => $cv, 'id' => $id, 'download' => true])->render();
		$pdf  = new Pdf($html);
		if (!$pdf->send()) {
			$error = $pdf->getError();
			return redirect()->back()->with('error', 'A apărut o eroare la generarea CV-ului. Vă rugăm să încercați din nou: ' . $error);
		}
		return $pdf->send();
	}

	public function destroy($id) {
		$cv = \App\Models\CV::where('id', $id)->first();
		if ($cv) {
			$cv->delete();
			return redirect()->back()->with('success', 'CV-ul a fost șters cu succes.');
		}
		return redirect()->back()->with('error', 'A apărut o eroare la ștergerea CV-ului. Vă rugăm să încercați din nou.');
	}
}
