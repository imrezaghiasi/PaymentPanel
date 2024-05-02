<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Payment Management Laravel Project

#### This Laravel project is designed for efficient payment management, utilizing Laravel 11 for backend development and Tailwind CSS for frontend styling.
## Features:

- Backend Framework: Built on Laravel 11, harnessing its robust features for seamless backend operations.
- Frontend Styling: Tailwind CSS is employed for crafting sleek and responsive user interfaces.
- Utilization of Laravel Tools: Leveraging various Laravel tools including Events, Listeners, Scheduling, and Artisan Commands for enhanced functionality and automation.
- Request Handling: Upon submission of a request, it is seamlessly routed to the administrator for review. Administrators have the capability to either reject or confirm requests.
- Notification System: In the event of a request rejection, notifications are automatically dispatched to the respective user, ensuring transparent communication.
- Payment Queue: Confirmed requests are queued for payment processing, streamlining the payment workflow for efficiency and reliability.
- Design Patterns: The project adopts the repository pattern and emphasizes dependency injection for enhanced code maintainability and scalability.

## Usage:
- > 1. git clone https://github.com/rezaghiasiii/PaymentPanel.git
- > 2. cd PaymentPanel
- > 3. composer install
- > 4. npm install
- > 5. cp .env.example .env
- > 6. Set up .env file
- > 7. php artisan key:generate
- > 8. php artisan storage:link
- > 9. php artisan migrate --seed
- > 10. php artisan serve
- > 11. npm run dev
- > 12. [http://127.0.0.1:8000/](http://127.0.0.1:8000/)


