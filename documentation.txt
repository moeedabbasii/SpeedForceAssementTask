Route Details

Rate Limiting

Middleware: throttle:5,1
Description: Apply rate limit of 5 requests per minute to all routes within this group.
Authentication Routes

Register

Method: POST
Endpoint: /register
Description: Handles user registration. It does not require any authentication but is subject to the defined rate limit.
Body:
example:
{
    "name": "test",
    "email": "test2@example.com",
    "password": "test12345",
    "password_confirmation":"test12345"
}

Login

Method: POST
Endpoint: /login
Description: Handles user login and returns an authentication token. Like the registration route, it does not require prior authentication but is rate-limited.
Body:
example:
{
    "name": "test",
    "email": "test2@example.com",
    "password": "test12345",
    "password_confirmation":"test12345"
}



Logout

Method: POST
Endpoint: /logout
Middleware: auth:sanctum
Description: Logs out the authenticated user. This route requires the user to be authenticated via Sanctum.
Retailer Role Routes

Middleware: auth:sanctum, role:Retailer

Description: These routes are protected by both the auth:sanctum middleware, ensuring that only authenticated users can access them, and the role:Retailer middleware, ensuring that only users with the Retailer role can access them.

Use Spin

Method: POST
Endpoint: /use-spin
Description: Allows a retailer to use a spin.

Buy Spin

Method: POST
Endpoint: /buy-spin
Description: Allows a retailer to purchase additional spins.


Spin History for Retailer

Method: GET
Endpoint: /spin-history
Description: Retrieves the spin history for the authenticated retailer.


Admin Role Routes

Middleware: auth:sanctum, role:Admin
Description: These routes are protected by the auth:sanctum middleware for authentication and the role:Admin middleware to restrict access to users with the Admin role only.


Spin History for Admin

Method: GET
Endpoint: /admin/spin-history
Description: Allows the admin to view the spin history of all retailers.


