import LoginPage from '../../pages/LoginPage';
import ProductListPage from '../../pages/ProductListPage';
import ProductDetailPage from '../../pages/ProductDetailPage';
import CartPage from '../../pages/CartPage';


describe ('Ecommerce Purchase flow', () => {
    const user = {
        email: 'test@example.com',
        password: '12345'
    };

    beforeEach(() => {
        cy.clearLocalStorage();
    });

    it('should complete add and remove cart flow', () => {

        // Login 
        LoginPage.visit();
        
        cy.intercept('POST', '**/api/login').as('loginRequest');

        LoginPage.login(user.email, user.password);

        cy.wait('@loginRequest');

        // Navigate to products and select first one
        cy.intercept('GET', '**/api/products').as('productsRequest');
        
        ProductListPage.visit();

        cy.wait('@productsRequest');

        // Product Detail
        cy.intercept('GET', '**/api/products/*').as('productDetailRequest');
        
        ProductListPage.clickFirstProduct();

        cy.wait('@productDetailRequest');

        cy.intercept('POST', '**/api/cart/items').as('addToCartRequest');

        ProductDetailPage.addToCart();

        cy.wait('@addToCartRequest');

        // Cart
        cy.intercept('GET', '**/api/cart').as('cartRequest');
        
        CartPage.visit();

        cy.wait('@cartRequest');
        
        CartPage.validateCartItemExists();

        // Remove
        cy.intercept('DELETE', '**/api/cart/items/*').as('removeItemRequest');

        CartPage.removeFirstItem();

        cy.wait('@removeItemRequest');

    }) ;

})