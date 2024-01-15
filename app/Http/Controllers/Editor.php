<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

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
		return view('editor.preview')->with('cv', $cv);
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

		$html = view('editor.pdf')->with('cv', $cv)->render();
//		return $html;
		// get pdf from api https://api.digitalreputation.ro/pdf by curl
		$curl = curl_init();
		curl_setopt_array($curl, array(
			// CURLOPT_URL            => "https://api.digitalreputation.ro/pdf",
			CURLOPT_URL            => "localhost/api",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => http_build_query([
				'html' => $html,
			]),
			CURLOPT_HTTPHEADER     => array(
				"Content-Type: text/html",
			),
		));
		$response = curl_exec($curl);
		$err      = curl_error($curl);
		curl_close($curl);
		if ($err) {
			return redirect()->back()->with('error', 'A apărut o eroare la generarea CV-ului. Vă rugăm să încercați din nou.');
		}
		// display pdf
		return response($response)->header('Content-Type', 'application/pdf');
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
