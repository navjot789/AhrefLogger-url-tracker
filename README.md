# AhrefLogger-url-tracker
Note: This system might not be fully functional on local environment.

The application aims to track user activity and the device information Whomever click on the
specific shorten link.

# The main objectives of this application are as follows:

• Use in Various organization to check its security level of their systems.

• Helps article/bloggers to short their long URL into short.

• Enhance web experiences(cookies).

• Detection of target devices (gathering information).

• Use in IT business to check the specification of competitor handset 

# This application consists of modules like:
 1. URL-shortening Encrypted
 2. URL-Shortening Decrypted
 3. Tracking Code
 4. QR-CODE Generator
 5. Login/signup
 6. Public Profile
 7. Email verification
 8. Forgot password
 9. ISP detection
10. Host detection
11. USER-AGENT detection
12. IP detection
13. Custom domain generation
14. View counter
15. Email on Every click features
16. Detect BOT-NET(Facebook, twitter)
17. Google Re-Captcha
18. Other famous embed shortening services
19. Note/Memo Option
20. Remove My data
21. Public/private url

# Application front view:
![front](https://i.ibb.co/XYwqqPb/Untitled.png)

# Application back view:

![back](https://i.ibb.co/gvPV61k/Untitled.png)

# Installation 
1. After uploading the zip file on the hosting server, then extract the files onto the server.
2. Now goto [Google recaptcha](https://www.google.com/recaptcha/admin/create) and create v2 recaptcha.
 
 Open file connection/connect.php and paste the public and secret key inside the variables.
 ```php
 $siteKey   = 'Google-recaptcha-V2-sitekey';
 $secretKey = 'Google-recaptcha-V2-secretkey';
 ```
 
 3. Create new database in Myphpadmin, import the SQL file in the DB and paste the credentials as follows.
 ```php
 $con = mysqli_connect("localhost","username","password","database");
 ```

# Installation of new Domain || Path || Extension
This first video guide you how to setup a free redirection & domain on AhrefLogger: [click here!](https://youtu.be/3iyihNIdw5M)

This Second video guide you how to install AhrefLogger source-code on your hosting : [click here!](https://youtu.be/LS-JD2VaxFA)

# want to contact me?
You can DM me on my instagram account: [click here!](https://www.instagram.com/code_lone/?hl=en)

