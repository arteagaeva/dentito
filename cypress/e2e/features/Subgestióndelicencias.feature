Feature: I enter the type of license option 
Scenario:successful create license
Given the user is on the login page
When the user enters the username "inteligenio"
When the user enters the password "Admin123456"
When clicks the "login" button
Given the user is on the submodulo page 
When the user enters the School "Nuestra señora de guadalupe inteligenio"
When the user enters the name "secretaria"
When the user enters Duration days "365"
When the user enters License role "secretaria"
When clicks in tipodelicencias
When clicks in guardar
# Then user sho should be redirected to the main page 
