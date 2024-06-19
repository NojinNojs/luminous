 # LUMINOUS E-commerce Project

![Luminous Logo](https://your-logo-url-here.com/logo.png)

LUMINOUS is a cutting-edge e-commerce platform that combines modern design with powerful functionality. Featuring a sleek dark theme and glassmorphism effects, LUMINOUS offers a visually stunning and seamless shopping experience. The platform is equipped with essential features for both users and administrators to efficiently manage products, orders, and user profiles.

## Features

- **User Authentication:** Secure registration, login, password reset, and email verification using SMTP.
- **Product Listing:** Paginated product display to ensure fast load times and a smooth browsing experience.
- **Shopping Cart:** Add, remove, and update product quantities in the cart.
- **Checkout:** Secure payment gateway integration for transactions in Indonesian Rupiah.
- **Admin Dashboard:** Comprehensive tools for managing products, orders, and user data.
- **Responsive Design:** Optimized for all devices, including mobile, tablet, and desktop.
- **Dark Theme with Glassmorphism:** Stylish and modern UI with a focus on usability and aesthetics.
- **SEO Optimization:** Built-in SEO best practices to ensure your site ranks well on search engines.

## Technologies

- **Backend:** PHP, MySQL
- **Frontend:** HTML, CSS, Bootstrap, JavaScript, Tailwind CSS
- **Email:** SMTP
- **Icons:** FontAwesome
- **Version Control:** Git

## Installation

Follow these steps to set up and run the project locally.

### Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL
- Git

### Steps

1. **Clone the repository:**
    ```sh
    git clone https://github.com/yourusername/luminous-ecommerce.git
    cd luminous-ecommerce
    ```

2. **Install dependencies:**
    ```sh
    composer install
    ```

3. **Set up environment variables:**
    Copy the `.env.example` file to `.env` and update the configuration values.
    ```sh
    cp .env.example .env
    ```

4. **Run migrations to set up the database:**
    ```sh
    mysql -u username -p luminous_db < database/migrations/limonous.sql
    ```

5. **Start the development server:**
    ```sh
    php -S localhost:8000 -t public
    ```

## Project Structure

```sh
luminous/
├── backend/
│ ├── config/
│ │ └── database.php
│ ├── includes/
│ │ └── send_email.php
│ ├── vendor/
├── app/
│ ├── css/
│ │ └── styles.css
│ ├── js/
│ │ └── scripts.js
│ ├── img/
│ ├── register.php
│ ├── verify.php
│ ├── homepage.php
├── public/
│ ├── css/
│ ├── js/
│ ├── images/
│ ├── uploads/
│ ├── index.php
│ ├── .htaccess
├── storage/
│ ├── logs/
│ ├── sessions/
├── .gitignore
├── .env
├── LICENSE
├── README.md
```

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request for any improvements, bug fixes, or new features.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries or issues, please contact us at [your-email@example.com](mailto:your-email@example.com).

---

Made with ❤️ by the Nojin


