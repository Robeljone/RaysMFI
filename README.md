
# Laravel 12 In-Memory CRUD (City Management)

This project is a Laravel 12 web-based CRUD application for managing city data without using a database. All data is stored in memory using Laravel Session, making it suitable for learning, rapid prototyping, coding tests, and UI/validation practice. The application uses Blade views, a single controller, a service layer, and Tailwind CSS via CDN with a searchable data table on the index page.

Project structure includes a CityController for handling HTTP requests, a CityService for business logic and session storage, web routes defined in `routes/web.php`, and Blade templates located in `resources/views/cities` (`index.blade.php`, `create.blade.php`, `edit.blade.php`). No authentication, migrations, or database configuration are required.

Each city is stored as an array in session with the following schema: `id` (UUID), `name`, `country`, `state`, `region`, `population` (integer), and `is_capital` (boolean). Data is saved under a session key (e.g. `cities`) and will reset when the session expires, the browser session ends, the server restarts, or the session is manually cleared. If you modify the schema (such as adding new fields) and CRUD operations stop working, clear the in-memory data using `Session::forget('cities')` or `Session::flush()`.

Form validation is designed correctly for web forms. Required fields include `name`, `country`, and `population`, while `state` and `region` are optional. Population is validated as an integer with a minimum of zero. Checkbox input for `is_capital` is handled separately using `$request->has('is_capital')` to safely convert the value to a boolean, avoiding common validation issues with HTML checkboxes.

Tailwind CSS is included via CDN in every Blade file, requiring no build step. The index page displays cities in a responsive table with client-side search implemented in JavaScript. Create and edit pages use clean, accessible form layouts styled with Tailwind utilities.

To run the project, install dependencies with Composer, start the Laravel development server, and open the application in your browser. This setup is intentionally simple and can be easily extended later to use a real database (Eloquent), add authentication, introduce pagination and sorting, convert to an API, or integrate Inertia with Vue or React.


Robel Yohannes.
