class ProductDetailPage {
    addToCart() {
        cy.get('[data-cy="add-to-cart-button"]').click();
    }
}

export default new ProductDetailPage();