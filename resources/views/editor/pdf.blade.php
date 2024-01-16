@extends('layouts/blankLayout')@section('title', 'Previzualizare CV')
@section('content')
	<div class="container mt-5">
		<header class="text-center">
			<h1>{{ $cv['nume'] }}</h1>
			<p class="lead">Curriculum Vitae</p>
		</header>
		<!-- Personal Information -->
		<section class="mt-4">
			<h2>Informații personale</h2>
			<div class="row">
				<div class="col-md-9">
					<ul class="list-group">
						<li class="list-group-item"><strong>Email:</strong> {{ $cv['email'] }}</li>
						<li class="list-group-item"><strong>Phone:</strong> {{ $cv['telefon'] }}</li>
						<li class="list-group-item"><strong>Descriere personală:</strong> {{ $cv['descriere'] }}</li>
					</ul>
				</div>
				<div class="col-md-3">
					<img src="{{ \Illuminate\Support\Facades\Storage::url($cv['poza']) }}" alt="Profile picture" class="img-fluid">
				</div>
			</div>
		</section>
		<!-- Education -->
		<section class="mt-4">
			<h2>Educație și formare profesională</h2>
			@foreach($cv['experienta_educationala'] as $exp)
				<div class="mb-3">
					<h5>Instituție: {{ $exp['institutie'] }}</h5>
					<p>Nivel: {{ $exp['degree'] }}</p>
					<p>Descriere: {{ $exp['descriere'] }}</p>
				</div>
			@endforeach
		</section>
		<!-- Work Experience -->
		<section class="mt-4">
			<h2>Experiență profesională</h2>
			@foreach($cv['experienta_profesionala'] as $exp)
				<div class="mb-3">
					<h5>Poziție: {{ $exp['jobTitle'] }}</h5>
					<p>Companie: {{ $exp['company'] }}</p>
					<p>Descriere: {{ $exp['workDescription'] }}</p>
				</div>
			@endforeach
		</section>
		<section class="mt-4">
			<h2>Competențe</h2>
			<div class="d-flex">
				@foreach($cv['competente'] as $skill)
					<div class="mb-3 alert alert-info">
						<h5>Competență: {{ $skill['skill'] }}</h5>
						<p class="m-0">Descriere: {{ $skill['skillDescription'] }}</p>
					</div>
				@endforeach
			</div>
		</section>
		<section class="mt-4">
			<h2>Limbi cunoscute</h2>
			<div class="d-flex">
				@foreach($cv['limbi_cunoscute'] as $language)
					<div class="mb-3 alert alert-primary w-auto">
						<h5>Limba: {{ $language['language'] }}</h5>
						<p class="m-0">Nivel: {{ $language['languageLevel'] }}</p>
					</div>
				@endforeach
			</div>
		</section>
	</div>
@endsection
