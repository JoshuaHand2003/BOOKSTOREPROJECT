# Bookstore Project

A PHP and MariaDB bookstore built with a simple MVC structure. This was completed individually as a college project.

## Verified features

- Browse the book catalogue.
- Register an account, log in, and log out.
- Add a book to the cart, keep it there while refreshing the page, and remove it.

The cart uses the PHP session. The setup database starts with empty `books` and `users` tables; it contains no personal data or sample accounts.

## Technologies tested

- XAMPP 8.2.12
- PHP 8.2.12 with PDO MySQL
- Apache 2.4.58
- MariaDB 10.4.32

## Run locally

1. Install XAMPP 8.2.12 and start Apache and MySQL in the XAMPP Control Panel.
2. Open phpMyAdmin and create a database named `bookstore_db`.
3. Select that database and import [`sql/bookstore.sql`](sql/bookstore.sql).
4. Check the local host, database name, username, and password in [`config/Database.php`](config/Database.php). Keep machine-specific credentials out of commits.
5. Place the `BOOKSTOREPROJECT` folder in XAMPP's `htdocs` directory.
6. Open [http://localhost/BOOKSTOREPROJECT](http://localhost/BOOKSTOREPROJECT) in a browser.

The database file creates the `books` and `users` tables. Register an account to try the login flow. The local verification used a disposable fake account and book; both were removed after testing.

## Verification

On 13 October 2026, the SQL file was imported into a clean local database. The home and books pages loaded, and registration, login, add-to-cart, cart refresh, remove-from-cart, logout, and login again were checked with fake local test data.

## Troubleshooting

No application errors needed troubleshooting during the verified run. If a database connection error appears, start MariaDB in XAMPP and check that the local values in `config/Database.php` match your setup. Do not publish real user data or database credentials.
