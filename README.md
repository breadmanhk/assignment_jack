# Grand Horizon Hotel - Reservation System

SEHS4517 Web Application Development and Management
Individual Assignment

## Project Structure

```
assignment/
├── reserve.html              # Main reservation form page
├── reserve.php               # Confirmation page (displays user input)
├── check.php                 # Validation result page
├── css/                      # Modular CSS architecture
│   ├── base.css             # Shared base styles (layout, buttons, etc.)
│   ├── reserve-form.css     # Form page specific styles
│   ├── reserve-confirm.css  # Confirmation page specific styles
│   └── check-result.css     # Result page specific styles
└── Assignment_Answers.txt    # Complete documentation
```

## Features

- **HTML5 Reservation Form** with professional UI design
- **PHP Session-based Processing** with input sanitization
- **Advanced Date/Time Validation** (24-72 hours advance booking)
- **Modular CSS Architecture** for better maintainability
- **Fully Responsive Design** for all devices
- **Production-Level Security** (XSS protection, input validation)

## CSS Architecture

The project uses a **modular CSS design** with separation of concerns:

### base.css (Shared Styles)
- Reset and base styles
- Container and layout
- Header with animated effects
- Button styles (all variants)
- Footer styling
- Utility classes
- Alert and info boxes
- Responsive breakpoints

### reserve-form.css (Form Page)
- Introduction section
- Form layout and styling
- Input fields, select, textarea
- Radio buttons
- Form-specific responsive design

### reserve-confirm.css (Confirmation Page)
- Details card styling
- Detail rows with hover effects
- Label and value layout

### check-result.css (Result Page)
- Dynamic success/error layouts
- Animation effects (slideUp, scaleIn)
- Message box styling
- Summary layout

## Benefits of Modular CSS

✅ **Maintainability** - Easy to update specific page styles
✅ **Reusability** - base.css shared across all pages
✅ **Organization** - Clear separation of concerns
✅ **Performance** - No duplicate CSS rules
✅ **Scalability** - Easy to add new pages
✅ **Professional** - Industry best practices

## Installation & Testing

1. Install XAMPP, WAMP, or MAMP
2. Place all files in htdocs/www folder
3. **Important**: Maintain folder structure (css/ folder)
4. Start Apache server
5. Access: http://localhost/reserve.html

## Submission Checklist

- [ ] Update name and ID in ALL files (HTML, PHP, CSS)
- [ ] Test all functionality
- [ ] Take screenshots of all pages
- [ ] Create Word document with code and screenshots
- [ ] Convert to PDF: A_YourName_YourID.pdf
- [ ] Create ZIP with all files: A_YourName_YourID.zip
- [ ] Submit to Blackboard by deadline

## Technologies Used

- HTML5 (XHTML syntax)
- CSS3 (Modular architecture)
- PHP (Session management, validation)
- No JavaScript (as per requirements)
- No videos/audio (as per requirements)

## Author

Student Name: [Your Full Name]
Student ID: [Your Student ID]
Submission Date: 18 October 2025
