import { use, useEffect, useState } from "react";
import { Search } from "lucide-react";
import Loading from "./components/ui/Loading";
import Error from "./components/ui/Error";

const BookSelection = () => {
	const [boards, setBoards] = useState([]);
	const [selectedBoard, setSelectedBoard] = useState("");
	const [seriess, setSeriess] = useState([]);
	const [selectedSeriess, setSelectedSeriess] = useState([]);
	const [subjects, setSubjects] = useState([]);
	const [classes, setClasses] = useState([]);
	const [books, setBooks] = useState([]);
	const [selectedSubjects, setSelectedSubjects] = useState([]);
	const [selectedClasses, setSelectedClasses] = useState([]);
	const [searchQuery, setSearchQuery] = useState("");
	const [selectedBooks, setSelectedBooks] = useState([]);
	const [loading, setLoading] = useState(true);
	const [errorStatus, setErrorStatus] = useState({
		error: false,
		message: "",
	});

	const BASE_URL =
		`${document
			.querySelector('meta[name="base_url"]')
			?.getAttribute("content")}api/` ||
		"http://localhost/htdocs/brightshinedigital.in/api/";

	const filteredBooks = books.filter((book) => {
		const matchesBoard =
			selectedBoard == book.boardName || book.boardName == "All";
		const matchesSeries =
			selectedSeriess.length === 0 || selectedSeriess.includes(book.seriesId);
		const matchesSubject =
			selectedSubjects.length === 0 ||
			selectedSubjects.includes(book.subjectId);
		const matchesClass =
			selectedClasses.length === 0 || selectedClasses.includes(book.classId);
		const matchesSearch = book.title
			.toLowerCase()
			.includes(searchQuery.toLowerCase());
		return (
			matchesBoard &&
			matchesSeries &&
			matchesSubject &&
			matchesClass &&
			matchesSearch
		);
	});

	useEffect(() => {
		fetchInitData();
	}, []);

	async function fetchInitData() {
		setLoading(true);
		const res = await fetch(`${BASE_URL}initBookSelection`);
		const data = await res.json();
		setBoards(data.boards);
		setSeriess(data.series);
		// setSelectedSeries(data.series[0]?.id);
		setSubjects(data.subjects);
		setClasses(data.classes);
		setBooks(data.books);
		data.selectedBoard
			? setSelectedBoard(data.selectedBoard)
			: setSelectedBoard(data.boards[0]?.name);
		if (data.selectedBooks.length) setSelectedBooks(data.selectedBooks);
		setLoading(false);
	}

	// async function fetchSeries() {
	// 	setLoading(true);
	// 	const res = await fetch(`${BASE_URL}getAllSeries`);
	// 	const data = await res.json();
	// 	setSeries(data);
	// 	setLoading(false);
	// }

	// async function fetchSubjectsBooks(seriesId) {
	// 	setLoading(true);
	// 	const res = await fetch(`${BASE_URL}getSubjectsBooks?series=${seriesId}`);
	// 	const data = await res.json();
	// 	setSubjects(data.subjects);
	// 	setBooks(data.books);
	// 	setLoading(false);
	// }

	// async function fetchClasses() {
	// 	setLoading(true);
	// 	const res = await fetch(`${BASE_URL}getAllClasses`);
	// 	const data = await res.json();
	// 	setClasses(data);
	// 	setLoading(false);
	// }

	// async function fetchbooks() {
	// 	setLoading(true);
	// 	const res = await fetch(`${BASE_URL}getBooks`);
	// 	const data = await res.json();
	// 	setBooks(data);
	// 	setLoading(false);
	// }

	// function handleSeriesChange(e) {
	// 	setSelectedBooks([]);
	// 	setSelectedSeries(e.target.value);
	// 	fetchSubjectsBooks(e.target.value);
	// }

	async function saveBooks() {
		setLoading(true);
		const res = await fetch(`${BASE_URL}saveBooks`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ selectedBooks, selectedBoard }),
		});
		const data = await res.json();
		if (!data.success) setErrorStatus({ error: true, message: data.message });
		window.location.href = data.redirect;
		setLoading(false);
	}

	function handleSaveBooks() {
		if (selectedBooks.length) {
			saveBooks();
		}
		return;
	}

	return (
		<>
			{loading && <Loading />}
			{errorStatus.error && (
				<Error message={errorStatus.message} setErrorStatus={setErrorStatus} />
			)}
			<div className="p-4 mx-auto bg-gray-50">
				{/* <div className="flex flex-col w-full gap-2 mb-2 sm:w-1/5">
					<label className="text-sm" htmlFor="series">
						Prescribed Series *
					</label>
					<select
						className="rounded-md"
						name="series"
						id="series"
						onChange={(e) => handleSeriesChange(e)}>
						{series.map((ser) => (
							<option key={ser.id} value={ser.id}>
								{ser.name}
							</option>
						))}
					</select>
				</div> */}

				{/* Search Bar */}
				<div className="relative mb-4">
					<Search className="absolute text-gray-400 left-3 top-3" size={20} />
					<input
						type="text"
						placeholder="Search books..."
						className="w-full py-2 pl-10 pr-4 border rounded-lg"
						value={searchQuery}
						onChange={(e) => setSearchQuery(e.target.value)}
					/>
				</div>

				<div className="grid h-full grid-cols-1 gap-4 md:grid-cols-4">
					{/* Filters Section */}
					<div className="space-y-4 md:col-span-1">
						<div className="p-4 bg-white rounded-lg shadow">
							<h3 className="mb-2 font-semibold">Board</h3>
							<form action="">
								{boards.map((board) => (
									<label
										key={board.id}
										className="flex items-center mb-2 space-x-2">
										<input
											type="radio"
											name="board"
											checked={selectedBoard == board.name}
											onChange={() => {
												setSelectedBoard((prev) => board.name);
												setSelectedBooks([]);
											}}
											className="rounded"
										/>
										<span>{board.name}</span>
									</label>
								))}
							</form>

							<h3 className="mb-2 font-semibold">Series</h3>
							{seriess.map((series) => (
								<label
									key={series.id}
									className="flex items-center mb-2 space-x-2">
									<input
										type="checkbox"
										checked={selectedSeriess.includes(series.id)}
										onChange={() => {
											setSelectedSeriess((prev) =>
												prev.includes(series.id)
													? prev.filter((id) => id !== series.id)
													: [...prev, series.id]
											);
										}}
										className="rounded"
									/>
									<span>{series.name}</span>
								</label>
							))}

							<h3 className="mb-2 font-semibold">Subjects</h3>
							{subjects.map((subject) => (
								<label
									key={subject.id}
									className="flex items-center mb-2 space-x-2">
									<input
										type="checkbox"
										checked={selectedSubjects.includes(subject.id)}
										onChange={() => {
											setSelectedSubjects((prev) =>
												prev.includes(subject.id)
													? prev.filter((id) => id !== subject.id)
													: [...prev, subject.id]
											);
										}}
										className="rounded"
									/>
									<span>{subject.name}</span>
								</label>
							))}

							<h3 className="mt-4 mb-2 font-semibold">Classes</h3>
							{classes.map((cls) => (
								<label
									key={cls.id}
									className="flex items-center mb-2 space-x-2">
									<input
										type="checkbox"
										checked={selectedClasses.includes(cls.id)}
										onChange={() => {
											setSelectedClasses((prev) =>
												prev.includes(cls.id)
													? prev.filter((id) => id !== cls.id)
													: [...prev, cls.id]
											);
										}}
										className="rounded"
									/>
									<span>{cls.name}</span>
								</label>
							))}
						</div>
					</div>

					{/* Books Grid */}
					<div className="overflow-y-auto md:col-span-3">
						{filteredBooks.length ? (
							<div className="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
								{filteredBooks.map((book) => (
									<div key={book.id} className="p-4 bg-white rounded-lg shadow">
										<label className="flex items-start space-x-2">
											<input
												type="checkbox"
												checked={selectedBooks.includes(book.id)}
												onChange={() => {
													setSelectedBooks((prev) =>
														prev.includes(book.id)
															? prev.filter((id) => id !== book.id)
															: [...prev, book.id]
													);
												}}
												className="mt-1 rounded"
											/>
											<div>
												<h3 className="font-semibold">{book.title}</h3>
												<p className="text-sm text-gray-600">
													{subjects.find((s) => s.id === book.subjectId)?.name}{" "}
													- {classes.find((c) => c.id === book.classId)?.name}
												</p>
											</div>
										</label>
									</div>
								))}
							</div>
						) : (
							<div className="flex items-center justify-center w-full h-full">
								<p className="text-2xl font-semibold text-center text-red-600">
									No Books available for selected criteria.
								</p>
							</div>
						)}
					</div>
				</div>
			</div>
			<div className="flex justify-end w-full px-4 pb-4 sm:pe-4">
				<button
					disabled={!selectedBooks.length > 0}
					className="w-full sm:w-[74%] disabled:bg-gray-500 disabled:cursor-not-allowed px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-800"
					onClick={handleSaveBooks}>
					Register
				</button>
			</div>
		</>
	);
};

export default BookSelection;
