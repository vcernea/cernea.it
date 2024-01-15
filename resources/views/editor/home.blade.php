@extends('layouts/blankLayout')@section('title', 'CV editor')

@section('content')
	<div class="container-xxl flex-grow-1 container-p-y mt-5">
		<div class="row">
			<div class="col-lg-12 mb-4 order-0">
				<div class="card">
					<div class="d-flex align-items-end">
						<div class="card-body d-flex">
							<a href="{{ route("cv.list") }}" class="btn btn-xl btn-outline-primary w-100 mx-2">Listă CV</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
