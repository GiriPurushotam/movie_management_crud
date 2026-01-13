const input = document.getElementById('searchInput');
const resultBox = document.getElementById('autocompleteResults');

if(input && resultBox) {
	input.addEventListener('input', async () => {
		const query = input.value.trim();

		if(query.length < 2) {
			resultBox.style.display = 'none';
			return;
			
		}

		try {
		const res = await fetch(`ajax_search.php?q=${encodeURIComponent(query)}`);
		const data = await res.json();

		resultBox.innerHTML = '';

		if(data.length === 0) {
			resultBox.style.display = 'none';
			return;
		}

		data.forEach(movie => {
			const div = document.createElement('div');
			div.classList.add('autocomplete-item')
			div.className = 'autocomplete-item';
			div.textContent = movie.title;

			div.addEventListener('click', () => {
				input.value = movie.title;
				resultBox.style.display = 'none';
			});
			resultBox.appendChild(div);
		});

		resultBox.style.display = 'block';
	} catch (err) {
		conole.error(err);
		resultBox.style.display = 'none';
	}
	});

	input.addEventListener('keydown', e => {
		if(e.key === 'Enter') {
			resultBox.style.display = 'none';
		}
	})

	document.addEventListener('click', e => {
		if(!e.target.closest('.search-form')) {
			resultBox.style.display = 'none';
		}
	})

}