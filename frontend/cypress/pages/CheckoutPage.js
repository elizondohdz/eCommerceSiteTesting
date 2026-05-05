class CheckoutPage {
    placeOrder() {
        cy.get('[data-cy="place-order-button"').click();
    }

    validateSuccess() {
        cy.get('[data-cy="checkout-success"]')
            .should('be.visible');
    }
}

export default new CheckoutPage
