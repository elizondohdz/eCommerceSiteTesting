class ProductListPage {
    visit() {
        cy.visit('/products');
    }

    clickFirstProduct() {
        cy.get('[data-cy="product-card"]')
            .first()
            .click();
    }
}

export default new ProductListPage();