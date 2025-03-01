window.addEventListener("DOMContentLoaded", () => {
	const subjectSelectionInput = document.getElementById("selectSubject");
	const bookSelectionInput = document.getElementById("selectBook");

	let selectedSubject = subjectSelectionInput.value;
	const loading = document.getElementById("loading");

	let selectedBook = bookSelectionInput.value;
	const selectedCategory = document.querySelector("#selectedCategory").value;
	const searchBtn = document.querySelector("#searchBtn");
	const categoryBtns = document.querySelectorAll("#categoryBtns button");

	subjectSelectionInput.addEventListener("change", function (e) {
		selectedSubject = this.value;
		updateBooks();
	});

	bookSelectionInput.addEventListener("change", function (e) {
		selectedBook = this.value;
	});

	function updateBooks() {
		// const standard = document.getElementById("standard").value;

		// Clear previous options
		bookSelectionInput.innerHTML = "";

		if (books) {
			// Populate book options based on selected class and subject
			books.forEach((book) => {
				if (book.sid == selectedSubject) {
					const option = document.createElement("option");
					option.value = book.id;
					option.textContent = book.name;
					bookSelectionInput.appendChild(option);
				}
			});
		}
	}
	updateBooks();

	async function updateSelections(categoryId = null) {
		loading.classList.toggle("hidden");
		const res = await fetch(`${BASE_URL}api/updateSelections`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({
				selectedSubject,
				selectedBook,
				selectedCategory: categoryId ? categoryId : selectedCategory,
			}),
		});
		window.location.reload();
	}

	searchBtn.addEventListener("click", function () {
		updateSelections();
	});

	categoryBtns.forEach((button) =>
		button.addEventListener("click", function (e) {
			updateSelections(this.dataset.id);
		})
	);
});
