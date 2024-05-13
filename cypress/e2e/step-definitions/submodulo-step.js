const { Given,When,Then,And } = require("@badeball/cypress-cucumber-preprocessor")
import loginPage from "../pages/loginPage"

Given("the user is on the login page",() => {
    cy.visit("/");

})
When("the user enters the username {string}",(user) => {
    loginPage.whiterUser(user);
})


When("the user enters the password {string}",(password) => {
    loginPage.whiterpassword (password);
})

When("clicks the {string} button",()=>{
    loginPage.clickLogin()
})

When("clicks in manager",()=>{
    loginPage.clickmanager()
})

When("clicks in gestióndelicencias",()=>{
    loginPage.clickgestióndelicencias()
})

    When("clicks in tipodelicencias",()=>{
        loginPage.clickLogin()
})
    
When(" the user enters the School{string}",(School) => {
    loginPage.whiterSchool(School);
});


When("the user enters the name {string}",(name) => {
    loginPage.whitername(name);
});
    When(" the user enters Duration days {int}",(durationdays) => {
        loginPage.whiterdurationdays(durationdays);
});
    
    When("the user enters License role {string}",(naLicenserolename) => {
        loginPage.whitername(Licenserolename);

})

When("clicks in tipodelicencias",()=>{
    loginPage.clicktipodelicencia()
})

When(" clicks in guardar",()=>{
    loginPage.clicknguardar()
})
