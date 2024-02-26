# Admin Management

This folder contains the backend admin panel.

## Description

The backend admin panel is built using CodeIgniter 3.

## Contributing

If you'd like to contribute, please fork the repository and create a pull request. You can also create issues if you find any bugs or have suggestions for improvements.

## Documentation

- CodeIgniter 3 Official Documentation: [CodeIgniter 3 Documentation](https://codeigniter.com/user_guide/)
- Framework7 Official Documentation: [Framework7 Documentation](https://framework7.io/docs/)

You can refer to these official documentation links for detailed information on how to use CodeIgniter 3 and Framework7 in your project.

## Views and Controllers

- Controllers: Inside `application/controllers` folder
  - Two main models:
    1. `Model_login.php`: for login functionality
    2. `Model_common.php`: for common queries

- Models: Inside `application/models` folder

- Views:
  - Pages: Inside `application/views/pages` folder
  - Layouts: Inside `application/views/layouts` folder
    - Contains header, sidebar, symbols, modal, and footer

There are two main views:
1. `v_login.php`: for the login page (default controller)
2. `v_main.php`: for loading all views from controllers and pages

## License

This project is licensed under the [MIT License](link-to-license-file).
