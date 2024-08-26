# ToDo List Application

Welcome to the ToDo List Application! This project is a simple and intuitive task management tool built to help you organize and manage your tasks efficiently.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Postman Collection](#postman-collection)
- [Important Points](#important-points)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Add Tasks**: Quickly add tasks with a title and description.
- **Edit Tasks**: Modify task details whenever needed.
- **Delete Tasks**: Remove tasks that are no longer needed.
- **Mark as Completed**: Mark tasks as completed to keep track of progress.
- **Responsive Design**: The application works well on both desktop and mobile devices.

## Installation

To install and run this project locally, follow these steps:

1. **Clone the repository**:
    ```bash
    git clone https://github.com/adnnco/todolist.git
    cd todolist
    ```

2. **Install dependencies**:
    - Ensure you have [Node.js](https://nodejs.org/) installed.
    - Run the following command to install the required packages:
    ```bash
    npm install
    ```

3. **Set up the environment**:
    - If your project requires environment variables, create a `.env` file in the root directory and configure it with necessary variables. (Refer to `.env.example` if available)

## Usage

After completing the installation steps, you can start the application by running:

```bash
npm run dev or npm run build
  ```

This will start the development server, and you can view the application in your browser at [http://localhost:3000](http://localhost:3000).

## Postman Collection

To interact with the ToDo API, a Postman collection is provided. This collection includes all the necessary endpoints for user authentication and task management.

1. **Import the Collection**:
    - Download the Postman collection file included in this repository.
    - Open Postman, go to the "Collections" tab, and click "Import".
    - Select the downloaded `.json` file to import the collection.

2. **Running the Collection**:
    - **API Token**: The first step is to generate an API token using the `API Token (POST)` endpoint. This token is critical for authenticating all other requests.
    - **Set Up Authentication**: After obtaining the token, it is recommended to set it as a Bearer Token in Postman's authorization tab. This will ensure that the token is automatically included in the headers of all subsequent requests.
    - Use the provided endpoints to manage tasks, such as creating, updating, retrieving, and deleting tasks.

## Important Points

- **Environment Variables**: Make sure to set up your `.env` file with the correct values for your environment.
- **Dependencies**: The application relies on certain npm packages listed in `package.json`. Ensure all dependencies are installed before starting the project.
- **Scripts**: The following npm scripts are available:
  - `npm start`: Runs the app in development mode.
  - `npm run build`: Builds the app for production.
  - `npm test`: Runs the test suite (if tests are set up).
- **Routing**: If your app uses routing, make sure your server configuration supports client-side routing (e.g., with React Router).

## Contributing

If you’d like to contribute to this project, please fork the repository, create a new branch, and submit a pull request. Contributions are welcome!
