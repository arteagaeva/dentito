class submoduloPage{
    elements={
        School: () => cy.get('#input-271'),
        name: () => cy.get('#input-277'),
        durationdays : () => cy.get('#input-281'),
        Licenserole: () => cy.get('#input-285'),
        btntipodelicencia: () =>cy.get(':nth-child(2) > .d-flex > div > .v-btn > .v-btn__content'),
        btguardar: () =>cy.get('.btn_block_style2 > .v-btn__content')
}

clicktipodelicencia(){
    this.elements.btntipodelicencia().click()
}
whiterschool(school) {
    this.elements.schoolname().type(school);
}
whitername(name) {
    this.elements.name().type(name);
}
whiterdurationdays(durationdays) {
    this.elements.durationdays().type(durationdays);
}
whiterLicenserole(Licenserolename) {
    this.elements.Licenserolename().type(Licenserolename);
}
clickguardar(){
    this.elements.btnguardar().click()
}

}

export default new loginPage();
