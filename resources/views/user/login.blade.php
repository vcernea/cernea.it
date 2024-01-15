@extends('layouts/blankLayout')@section('title', 'Login Basic - Pages')

@section('page-style')
	<!-- Page -->
	<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('content')
	<div class="container-xxl">
		<div class="authentication-wrapper authentication-basic container-p-y">
			<div class="authentication-inner">
				<!-- Register -->
				<div class="card">
					<div class="card-body">
						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<a href="{{url('/')}}" class="app-brand-link gap-2">
								<span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
								<span class="app-brand-text demo text-body fw-bold">{{config('variables.templateName')}}</span>
							</a>
						</div>
						<!-- /Logo -->
						<h4 class="mb-2">Welcome to {{config('variables.templateName')}}! 👋</h4>
						<p class="mb-4">Vă rugăm să vă conectați cu <code>cerneavictor0@gmail.com</code> și <code>admin</code></p>
						<form id="formAuthentication" class="mb-3" action="{{url('/user/login')}}" method="POST">
							{{ csrf_field() }}
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="text" class="form-control" id="email" name="email" placeholder="Email" autofocus value="cerneavictor0@gmail.com">
							</div>
							<div class="mb-3 form-password-toggle">
								<div class="d-flex justify-content-between">
									<label class="form-label" for="password">Parola</label>
								</div>
								<div class="input-group input-group-merge">
									<input type="password" id="password" class="form-control" value="admin" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
									<span class="input-group-text cursor-pointer">
										<i class="bx bx-hide"></i>
									</span>
								</div>
							</div>
							@if ($errors->any())
								<div class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<p class="m-0">{{ $error }}</p>
									@endforeach
								</div>
							@endif
							<div class="mb-3">
								<button class="btn btn-primary d-grid w-100" type="submit">Autentificare</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /Register -->
		</div>
	</div>
@endsection
