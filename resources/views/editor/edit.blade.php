@extends('layouts/blankLayout')
@section('title', 'CV editor')

@section('page-script')
	<script src="{{ asset('/assets/js/cveditor.js') }}"></script>
@endsection

<div class="container mt-5">
	<a href="{{ route('home') }}" class="btn btn-outline-primary">
		<i class="bx bx-home"></i> Acasă
	</a>
</div>

@section('content')
	<livewire:editor.edit-cv />
@endsection
