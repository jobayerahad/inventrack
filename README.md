# InvenTrack

InvenTrack is a stock management system designed to streamline the tracking and management of IT equipment within SBAC Bank PLC's IT Division. The system enables monitoring of items sent for repair, requests for new equipment, vendor repairs, procurement processes, and inventory management.

## Features

- **Item Tracking**: Manage IT equipment across branches, track repairs, replacements, and returns.
- **Vendor Management**: Track items sent to vendors for repair and manage the repair history.
- **Branch Requests**: Allow branches to request repairs or new equipment.
- **Procurement Workflow**: Support for procurement approvals and tracking board authorizations.
- **Asset Tagging and Depreciation**: Tag assets for tracking and calculate depreciation.
- **Invoice Management**: Generate and manage vendor invoices for repairs.

## Technology Stack

- **Backend**: PHP (with raw SQL using PDO for MySQL)
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL
- **Server**: XAMPP (Local Development)

## Folder Structure

```bash
inventrack/
├── assets/                   # Static files (CSS, JS, images)
├── config/                   # Database configuration
├── controllers/              # Application logic for each feature
├── models/                   # Database interaction for each model
├── views/                    # HTML templates organized by feature
├── public/                   # Public entry points and main application pages
├── routes/                   # URL routes mapped to controllers
├── tests/                    # Test cases for application components
├── uploads/                  # Folder for user-uploaded files
└── utils/                    # Helper functions
```

## Installation

```bash
git clone https://github.com/jobayerahad/inventrack.git
```

## Usage

- **Login**: Access the main dashboard with your credentials.
- **Dashboard**: View equipment statuses, request updates, and manage items.
- **Requests**: Branches can submit repair or procurement requests.
- **Procurement**: Handle approvals and procurement tracking for new equipment.
- **Invoicing**: Generate invoices for vendor repair services.

## Development Notes

- For development, use `localhost/inventrack/public/index.php`.
- Update `.gitignore` to exclude sensitive files and large directories.
- Customize `config/database.php` or use a `.env` file to secure database credentials.

## Contributing

1. Fork the project.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add new feature'`).
4. Push the branch (`git push origin feature-branch`).
5. Open a Pull Request.

## License

This project is intended for internal use within SBAC Bank PLC IT Division.
