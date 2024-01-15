# Online General Portal (Under Development)

The **PHP Online General Portal** is a web-based application designed to manage student course enrollments in an educational institution. The system allows students to enroll in courses, view enrollment history, and generate printable enrollment details and also view their results for every semester.

## Table of Contents

- [Features](#features)
- [Media](#screenshots)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Folder Structure](#folder-structure)
- [Dependencies](#dependencies)
- [Contributing](#contributing)
- [License](#license)

## Features

1. **User Authentication:**
   - Secure login system for students.
   - Session management to keep users logged in.

2. **Course Enrollment:**
   - Students can enroll in courses based on their academic requirements.
   - Course details include course code, name, unit, program, level, and semester.

3. **Enrollment History:**
   - View a comprehensive history of enrolled courses.
   - Display details such as course name, semester, and enrollment date.

4. **Printable Enrollment Details:**
   - Generate and print detailed enrollment information for a specific course.

5. **Responsive Design:**
   - User-friendly interface accessible on various devices.
  
## Media 
![Wiaw](https://github.com/CobbyElsonfx/Course-Registration-Portal/assets/109095646/abdc4f69-5f7b-4ec2-949e-260736b100a7)

![UI](https://github.com/CobbyElsonfx/Course-Registration-Portal/assets/109095646/9fcc2d78-e13e-4b02-9c38-22b4aab7d8aa)
![excel](https://github.com/CobbyElsonfx/Course-Registration-Portal/assets/109095646/b0c09b55-3531-4ccd-9e8f-e307c8988b2c)

![Boui](https://github.com/CobbyElsonfx/Course-Registration-Portal/assets/109095646/e038c44e-1a92-490f-aee4-5198c79155db)

## Requirements

1. **Web Server:**
   - Install and configure a web server (e.g., Apache, Nginx).

2. **Database:**
   - Set up a MySQL database.
   - Import the provided SQL script to create the necessary tables.

3. **PHP:**
   - PHP version 7.x or higher.

4. **Dependencies:**
   - Ensure required dependencies are installed (see [Dependencies](#dependencies)).

## Installation

1. **Clone Repository:**
```bash
   git clone https://github.com/yourusername/php-enrollment-system.git
```
## Database Configuration:

1. **Create a MySQL Database:**
   - Create a MySQL database.

2. **Import SQL Script:**
   - Import the SQL script (`database.sql`) into the created database.

## Configuration File:

- Configure database connection settings in `includes/config.php`.

## Web Server Setup:

- Configure your web server to point to the project directory.

## Usage

1. **Login:**
   - Access the application through a web browser.
   - Log in with your student credentials.

2. **Enroll in Courses:**
   - Navigate to the enrollment section to add courses based on your academic plan.

3. **View Enrollment History:**
   - Check your enrollment history to see a list of courses you've enrolled in.

4. **Print Enrollment Details:**
   - Generate and print detailed information for a specific course.

## Folder Structure

## Folder Structure

```plaintext
php-enrollment-system/
|-- admin/
|   |-- [admin-related files and directories]
|-- assets/
|   |-- css/
|   |   |-- bootstrap.css
|   |   |-- font-awesome.css
|   |   |-- style.css
|   |-- js/
|       |-- jquery-1.11.1.js
|       |-- bootstrap.js
|-- includes/
|   |-- config.php
|   |-- footer.php
|   |-- header.php
|   |-- menubar.php
|-- studentphoto/
|-- .gitignore
|-- database.sql
|-- enrollment-history.php
|-- index.php
|-- print.php
|-- README.md
|-- enroll-history-page.png
|-- enroll-page.png
|-- .gitignore
```

## Dependencies

- **Bootstrap:** Front-end framework for responsive design.
  - [Bootstrap](https://getbootstrap.com/)

## Contributing

Feel free to contribute to this project by submitting issues or pull requests.

## License

This project is licensed under the [MIT License](LICENSE).
