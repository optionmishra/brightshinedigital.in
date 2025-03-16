import { CircleX } from "lucide-react";

export default function Error({ message, setErrorStatus }) {
	return (
		<div
			className="absolute w-full h-full bg-[#9ca3afaa] top-0 z-50"
			id="loading">
			<div
				role="status"
				className="absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2">
				<div className="relative p-5 bg-white rounded-lg shadow-lg min-w-96">
					<button
						className="absolute top-1 right-1"
						onClick={() => setErrorStatus({ status: false })}>
						<CircleX />
					</button>
					<p className="text-2xl font-semibold text-center text-red-800">
						{message}
					</p>
				</div>
			</div>
		</div>
	);
}
