# Admin Frontend

This folder contains the frontend application for users.

## Description

This frontend application is built using Framework7, a JavaScript framework for building mobile and web applications. It interacts with the backend to fetch data for display.

The data is fetched from:
- Local: `admin_management/Api/function`
- Domain: `domain/admin/Api/function`

This application serves as an interface for users to interact with the data provided by the backend API. By default, users need to log in using their email and password from the `tbl_user` table in the database.

Upon logging in, the application loads default data for all malls. Users can then navigate to different malls, and the application will display data based on the selected mall.

For login and PWA setup, refer to the `index.html` file. It loads `sw.js`, `manifest.json`, and for all API data, it loads from `sidedata.js` (ensure redirection to this file).


## Contributing

If you'd like to contribute, please fork the repository and create a pull request. You can also create issues if you find any bugs or have suggestions for improvements.

## License

This project is licensed under the [MIT License](link-to-license-file).
