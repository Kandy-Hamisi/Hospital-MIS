### Sega Hospital Management Information System

Create database 'segaHospital' in phpmyadmin then import segaHospital.sql from the sql folder

acces the system in your browser after extracting it to the xammp/wampp specific folder

- The system has four modules
    - Admin Module
        - add doctor and manage them
        - add patient and manage them
        - add wards, rooms and beds
        - add nurses
        - view appointment history of doctors

    - Doctor Module
        - add Patients and manages them
        - add patient medical information
        - view appointment history of their specific patient
    - Nurse Module
        - allocate beds to in-patients only
    - Patient Module
- Also has a landing page directing each user to their specific modules
- Once a user creates an account they receive an email as a feed back

### The technologies used
The following technologies were used:
- Core PHP
- MySQL
- Ajax
- Javascript
- HTML5
- CSS3
- jQquery

### Third Party Technologies
The following Third Party technologie and tools were used:
- SB Admin Dashboard template
- composer
- PHPMailer
- Bootstrap
- DataTables

### PHP Mailer
For user mailing functionality edit signup.php in patient/controller/signup.php
- replace the text 'your email' with your own email that will be used in sending email to users.
- Go to your email setting in your device and enable unsecure apps

Any rectification is accepted.