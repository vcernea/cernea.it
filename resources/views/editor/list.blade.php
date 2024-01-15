@extends('layouts/blankLayout')
@section('title', 'CV editor')

<div class="container mt-5 d-flex justify-content-between">
	<a href="{{ route('home') }}" class="btn btn-outline-primary">
		<i class="bx bx-home"></i> Acasă
	</a>
	<a href="{{ route('cv.create') }}" class="btn btn-outline-primary">
		<i class="bx bx-plus"></i> Adaugă CV
	</a>
</div>

@section('content')
	<livewire:editor.list-cv />
@endsection
