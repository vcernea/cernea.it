<div class="container flex-grow-1 container-p-y">
	<form action="{{ route('cv.store') }}" method="post" wire:submit="save">
		@csrf
		<div class="row">
			<h2 class="mb-3 col-12">Informații personale</h2>
			<div class="mb-3 col-12">
				<label for="fullName" class="form-label">Nume complet</label>
				<input type="text" class="form-control" id="fullName" name="fullName" wire:model="fullName">
				<div>
					@error('fullName')
					<span class="error">{{ $message }}</span> @enderror
				</div>
			</div>
			<div class="mb-3 col-12 col-md-6">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" id="email" name="email" wire:model="email">
				<div>
					@error('email')
					<span class="error">{{ $message }}</span> @enderror
				</div>
			</div>
			<div class="mb-3 col-12 col-md-6">
				<label for="phone" class="form-label">Telefon</label>
				<input type="tel" class="form-control" id="phone" name="phone" wire:model="phone">
				<div>
					@error('phone')
					<span class="error">{{ $message }}</span> @enderror
				</div>
			</div>
			<div class="mb-3 col-12">
				<label for="self_description" class="form-label">Descriere personală</label>
				<textarea class="form-control" id="self_description" name="self_description" wire:model="self_description" rows="3"></textarea>
				<div>
					@error('self_description')
					<span class="error">{{ $message }}</span> @enderror
				</div>
			</div>
			<div class="mb-3 col-sm-6">
				<label for="profile_picture" class="form-label">Imagine de profil
					<input type="file" class="form-control" id="profile_picture" name="profile_picture" wire:model="profile_picture">
				</label>
				<div>
					@error('profile_picture')
					<span class="error">{{ $message }}</span> @enderror
				</div>
			</div>
			<div class="col-12">
				<hr>
				<h2 class="mb-3">Educație și formare profesională</h2>
				<div id="educationContainer">
					@foreach ((array)$degrees as $i => $degree)
						<div class="mb-3 education-section">
							<label for="degree" class="form-label">Nivel</label>
							<input type="text" class="form-control" name="degree[]" wire:model="degrees.{{ $i }}.degree">
							<label for="institution" class="form-label">Instituție</label>
							<input type="text" class="form-control" name="institution[]" wire:model="degrees.{{ $i }}.institutie">
							<label for="educationDescription" class="form-label">Descriere</label>
							<textarea class="form-control" name="educationDescription[]" rows="3" wire:model="degrees.{{ $i }}.descriere"></textarea>
							<button type="button" class="btn btn-danger removeEducationBtn mt-2" wire:click="removeEducation({{ $i }})">Elimină elementul</button>
						</div>
					@endforeach
					<template id="educationTemplate">
						<div class="mb-3 education-section">
							<label for="degree" class="form-label">Nivel</label>
							<input type="text" class="form-control" name="degree[]" wire:model="degrees.{{ count($degrees) }}.degree">
							<label for="institution" class="form-label">Instituție</label>
							<input type="text" class="form-control" name="institution[]" wire:model="degrees.{{ count($degrees) }}.institutie">
							<label for="educationDescription" class="form-label">Descriere</label>
							<textarea class="form-control" name="educationDescription[]" rows="3" wire:model="degrees.{{ count($degrees) }}.descriere"></textarea>
							<button type="button" class="btn btn-danger removeEducationBtn mt-2" wire:click="removeEducation({{ count($degrees) }})">Elimină elementul</button>
						</div>
					</template>
				</div>
				<div>
					@error('degrees')
					<span class="error">{{ $message }}</span> @enderror
				</div>
				<button type="button" id="addEducationBtn" wire:click="addEducation" class="btn btn-success">Adaugă</button>
			</div>
			<div class="col-12">
				<hr>
				<h2 class="mb-3">Experiență profesională</h2>
				<div id="workExperienceContainer">
					@foreach ((array)$experience as $i => $experience)
						<div class="mb-3 work-experience-section">
							<label for="jobTitle" class="form-label">Titlul jobului</label>
							<input type="text" class="form-control" name="jobTitle[]" wire:model="experience.{{ $i }}.jobTitle">
							<label for="company" class="form-label">Companie</label>
							<input type="text" class="form-control" name="company[]" wire:model="experience.{{ $i }}.company">
							<label for="workDescription" class="form-label">Descrierea jobului</label>
							<textarea class="form-control" name="workDescription[]" rows="3" wire:model="experience.{{ $i }}.workDescription"></textarea>
							<button type="button" class="btn btn-danger removeWorkExperienceBtn mt-2" wire:click="removeExperience({{ $i }})">Elimină elementul</button>
						</div>
					@endforeach
					<template id="workExperienceTemplate">
						<div class="mb-3 work-experience-section">
							<label for="jobTitle" class="form-label">Titlul jobului</label>
							<input type="text" class="form-control" name="jobTitle[]" wire:model="experience.{{ count($experience) }}.jobTitle">
							<label for="company" class="form-label">Companie</label>
							<input type="text" class="form-control" name="company[]" wire:model="experience.{{ count($experience) }}.company">
							<label for="workDescription" class="form-label">Descrierea jobului</label>
							<textarea class="form-control" name="workDescription[]" rows="3" wire:model="experience.{{ count($experience) }}.workDescription"></textarea>
							<button type="button" class="btn btn-danger removeWorkExperienceBtn mt-2" wire:click="removeExperience({{ count($experience) }})">Elimină elementul</button>
						</div>
					</template>
				</div>
				<div>
					@error('experience')
					<span class="error">{{ $message }}</span> @enderror
				</div>
				<button type="button" id="addWorkExperienceBtn" wire:click="addExperience" class="btn btn-success">Adaugă</button>
			</div>
			<div class="col-12">
				<hr>
				<h2 class="mb-3">Aptitudini</h2>
				<div id="skillsContainer">
					@foreach ((array)$skills as $i => $skill)
						<div class="mb-3 skills-section">
							<label for="skill" class="form-label">Competență</label>
							<input type="text" class="form-control" name="skill[]" wire:model="skills.{{ $i }}.skill">
							<label for="skillDescription" class="form-label">Descrierea aptitudinii</label>
							<textarea class="form-control" name="skillDescription[]" rows="3" wire:model="skills.{{ $i }}.skillDescription"></textarea>
							<button type="button" class="btn btn-danger removeSkillsBtn mt-2" wire:click="removeSkill({{ $i }})">Elimină elementul</button>
						</div>
					@endforeach
					<template id="skillsTemplate">
						<div class="mb-3 skills-section">
							<label for="skill" class="form-label">Competență</label>
							<input type="text" class="form-control" name="skill[]" wire:model="skills.{{ count($skills) }}.skill">
							<label for="skillDescription" class="form-label">Descrierea aptitudinii</label>
							<textarea class="form-control" name="skillDescription[]" rows="3" wire:model="skills.{{ count($skills) }}.skillDescription"></textarea>
							<button type="button" class="btn btn-danger removeSkillsBtn mt-2" wire:click="removeSkill({{ count($skills) }})">Elimină elementul</button>
						</div>
					</template>
				</div>
				<div>
					@error('skills')
					<span class="error">{{ $message }}</span> @enderror
				</div>
				<button type="button" id="addSkillsBtn" class="btn btn-success" wire:click="addSkill">Adaugă</button>
			</div>
			<div class="col-12">
				<hr>
				<h2 class="mb-3">Limbi cunoscute</h2>
				<div id="languagesContainer">
					@foreach ((array)$languages as $i => $language)
						<div class="mb-3 languages-section row">
							<label for="language" class="form-label col-sm-6">Limba
								<input type="text" class="form-control" name="language[]" wire:model="languages.{{ $i }}.language">
							</label>
							<label for="languageLevel" class="form-label col-sm-6">Nivelul cunoștințelor
								<input type="text" class="form-control" name="languageLevel[]" wire:model="languages.{{ $i }}.languageLevel">
							</label>
							<div class="col-12">
								<button type="button" class="btn btn-danger removeLanguagesBtn mt-2" wire:click="removeLanguage({{ $i }})">Elimină elementul</button>
							</div>
						</div>
					@endforeach
					<template id="languagesTemplate">
						<div class="mb-3 languages-section row">
							<label for="language" class="form-label col-sm-6">Limba
								<input type="text" class="form-control" name="language[]" wire:model="languages.{{ count($languages) }}.language">
							</label>
							<label for="languageLevel" class="form-label col-sm-6">Nivelul cunoștințelor
								<input type="text" class="form-control" name="languageLevel[]" wire:model="languages.{{ count($languages) }}.languageLevel">
							</label>
							<div class="col-12">
								<button type="button" class="btn btn-danger removeLanguagesBtn mt-2" wire:click="removeLanguage({{ count($languages) }})">Elimină elementul</button>
							</div>
						</div>
					</template>
				</div>
				<div>
					@error('languages')
					<span class="error">{{ $message }}</span> @enderror
				</div>
				<button type="button" id="addLanguagesBtn" class="btn btn-success" wire:click="addLanguage">Adaugă</button>
			</div>
			@if (session()->has('message'))
				<div class="col-12 mt-4">
					<div class="alert alert-success text-black">
						{{ session('message') }}
					</div>
				</div>
			@endif
			<div class="col-12 my-3">
				<button type="submit" class="btn btn-primary w-100">Salvați</button>
			</div>
		</div>
	</form>
</div>
