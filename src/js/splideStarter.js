document.addEventListener('DOMContentLoaded', function () {
	return document.querySelectorAll('.splide').forEach((el, idx, arr) => {
		const splideOptions = {
			// type: 'loop',
			perPage: 3,
			gap: '1.5rem',
			breakpoints: {
				992: {
					perPage: 2,
				},
				768: {
					perPage: 1,
				},
			},
		};

		new Splide(el, splideOptions).mount();
	});
});
