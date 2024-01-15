document.addEventListener('DOMContentLoaded', function () {
	// Get the container for work experience fields
	const workExperienceContainer = document.getElementById('workExperienceContainer');

	// Get the template for a work experience field
	const workExperienceTemplate = document.getElementById('workExperienceTemplate');

	// Add event listener to the "Add Work Experience" button
	document.getElementById('addWorkExperienceBtn').addEventListener('click', function () {
		// Clone the template
		const clone = workExperienceTemplate.content.cloneNode(true);

		// Append the cloned template to the container
		workExperienceContainer.appendChild(clone);
	});

	// Add event listener to the "Remove Work Experience" buttons
	workExperienceContainer.addEventListener('click', function (event) {
		if (event.target.classList.contains('removeWorkExperienceBtn')) {
			// Remove the parent element (the entire work experience section)
			event.target.closest('.work-experience-section').remove();
		}
	});

	const skillsContainer = document.getElementById('skillsContainer');
	const skillsTemplate = document.getElementById('skillsTemplate');
	document.getElementById('addSkillsBtn').addEventListener('click', function () {
		const clone = skillsTemplate.content.cloneNode(true);
		skillsContainer.appendChild(clone);
	});
	skillsContainer.addEventListener('click', function (event) {
		if (event.target.classList.contains('removeSkillsBtn')) {
			event.target.closest('.skills-section').remove();
		}
	});

// do the same for education
	const educationContainer = document.getElementById('educationContainer');
	const educationTemplate = document.getElementById('educationTemplate');
	document.getElementById('addEducationBtn').addEventListener('click', function () {
		const clone = educationTemplate.content.cloneNode(true);
		educationContainer.appendChild(clone);
	});
	educationContainer.addEventListener('click', function (event) {
		if (event.target.classList.contains('removeEducationBtn')) {
			event.target.closest('.education-section').remove();
		}
	});

// do the same for languages
	const languagesContainer = document.getElementById('languagesContainer');
	const languagesTemplate = document.getElementById('languagesTemplate');
	document.getElementById('addLanguagesBtn').addEventListener('click', function () {
		const clone = languagesTemplate.content.cloneNode(true);
		languagesContainer.appendChild(clone);
	});
	languagesContainer.addEventListener('click', function (event) {
		if (event.target.classList.contains('removeLanguagesBtn')) {
			event.target.closest('.languages-section').remove();
		}
	});

});
