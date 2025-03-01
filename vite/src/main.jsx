import { StrictMode } from "react";
import { createRoot } from "react-dom/client";
import "./css/style.css";
import BookSelection from "./BookSelection.jsx";

createRoot(document.getElementById("bookSelection")).render(
	<StrictMode>
		<BookSelection />
	</StrictMode>
);
