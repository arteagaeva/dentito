class loginPage{
    elements={
        username: () => cy.get("#input-27"),
        password: () => cy.get("#input-28"),
        btnLogin: () => cy.get(".btn_block_style1")
    }
        
    whiterUser(user) {
        this.elements.username().type(user);
    }
    whiterpassword(password ) {
        this.elements.password().type(password);
    }

    clickLogin(){
        this.elements.btnLogin().click()
    }

}

export default new loginPage();
