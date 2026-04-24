class LoginPage {

  visit() {
    cy.visit('/login');
  }

  fillEmail(email) {
    cy.get('[data-cy="email-input"]').clear().type(email);
  }

  fillPassword(password) {
    cy.get('[data-cy="password-input"]').clear().type(password);
  }

  submit() {
    cy.get('[data-cy="login-button"]').click();
  }

  login(email, password) {
    this.fillEmail(email);
    this.fillPassword(password);
    this.submit();
  }

  getErrorMessage() {
    return cy.get('[data-cy="error-message"]');
  }

}

export default new LoginPage();