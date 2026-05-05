class CartPage {
    visit() {
        cy.visit('/cart');
    }

    validateCartItemExists() {
        cy.get('[data-cy="cart-item"]')
            .should('have.length.gt', 0)
    }

    removeFirstItem() {
        cy.get('[data-cy="remove-item-button"]')
            .first()
            .click();
    }

    validateCartIsEmpty() {
        cy.get('[data-cy="cart-item"]')
            .should('have.length', 0)
    }
}

export default new CartPage();