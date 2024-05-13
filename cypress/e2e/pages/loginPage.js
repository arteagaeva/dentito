class loginPage{
    elements={
        username: () => cy.get("#input-27"),
        password: () => cy.get("#input-28"),
        btnLogin: () => cy.get(".btn_block_style1"),
        btnmanager: () => cy.get('.v-list-group__header > .v-list-item__content'),
        btntgestióndelicencias: () => cy.get(':nth-child(2) > .v-list-item > .v-list-item__title')
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

    clickmanager(){
        this.elements.btnmanager().click()
    }

    clickgestióndelicencias(){
        this.elements.btntgestióndelicencias().click()
    }

}

export default new loginPage();
