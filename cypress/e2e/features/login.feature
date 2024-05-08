Feature: login to the application 
Scenario:successful login
Given the user is on the login page
When the user enters the username "inteligenio"
When the user enters the password "Admin123456"
When clicks the "login" button
# Then user sho should be redirected to the main page 
