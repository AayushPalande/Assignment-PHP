# Assignment-PHP
This project utilizes HTML, PHP, and PHPMailer for generating and displaying reports, as well as sending emails.

Setup Instructions
Prerequisites
XAMPP: Ensure XAMPP is installed on your computer. If not, download and install it from https://www.apachefriends.org/index.html.

Gmail Account: You will need a Gmail account to send emails. Follow the steps below to configure Gmail for SMTP authentication.

Downloading the Project 
Download ZIP Archive: Download the project files as a ZIP archive from the GitHub repository.

Extract Project Files: Extract the downloaded ZIP archive into a new folder named Your_folderName in C:\xampp\htdocs\.

Setting up XAMPP

Start XAMPP:
Open XAMPP Control Panel.
Start Apache and MySQL services.

Configuring Gmail for SMTP Authentication

Enable 2-Step Verification: Follow the instructions in this YouTube video to enable 2-Step Verification for your Gmail account: Watch YouTube Tutorial.

Generate an App Password: After enabling 2-Step Verification:
Go to your Google Account settings: https://myaccount.google.com/.
Navigate to "Security" > "App passwords" (under "Signing in to Google").
Select "App" as "Mail" and "Device" as "Other (Custom name)".
Generate the app password and use it in your send_email.php file:

$mail->Username = 'your-email@gmail.com'; // SMTP username
$mail->Password = 'your-app-password'; // SMTP app password

Usage
Open a web browser and navigate to http://localhost/Your_folderName/index.html.
Use the application to generate student reports, view them on the web page, and send them via email.

Additional Notes
For any difficulties during setup, refer to the YouTube tutorial: Watch YouTube Tutorial.
Customize placeholders such as your-email@gmail.com, your-app-password, and Your_folderName with your actual details.
Ensure to replace database.sql with the actual SQL file name if your project requires database setup.
Modify the instructions and details based on specific project requirements and configurations.

Contact:
For further assistance or questions regarding the project, please contact Aayush Palande at aayushpalande28@gmail.com.
