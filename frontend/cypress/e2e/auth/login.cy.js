import LoginPage from '../../pages/LoginPage';

describe('Login E2E', () => {
    
    const user = {
        email: 'test@example.com',
        password: '12345'
    };
    
    beforeEach(() => {
        cy.clearLocalStorage();
        LoginPage.visit();
    });
    
    it('should login successfully and store token', () => {
        
        cy.intercept('POST', '**/api/login').as('loginRequest');
        
        // POM call the custom command to login
        LoginPage.login(user.email, user.password);
        
        // Wait for the login request and validate the response contains the token
        cy.wait('@loginRequest').then((interception) => {
            expect(interception.response.statusCode).to.eq(200);
            expect(interception.response.body).to.have.property('token');
        });
        
        // Validate that we are redirected to the dashboard
        cy.url().should('include', '/dashboard');
        
        // Validate that the token is stored in localStorage
        cy.window().then((win) => {
            const token = win.localStorage.getItem('token');
            expect(token).to.exist;
        });
        
    });
    
    it('should NOT login with invalid credentials', () => {
        
        const invalidUser = {
            email: 'wrong@example.com',
            password: 'wrongpass'
        };
        
        // Intercept request
        cy.intercept('POST', '**/api/login').as('loginRequest');
        
        // POM call the custom command to login with invalid credentials
        LoginPage.login(invalidUser.email, invalidUser.password);
        
        // Validate that incorrect credentiales return 401
        cy.wait('@loginRequest').then((interception) => {
            expect(interception.response.statusCode).to.eq(401);
        });
        
        // Validate error message is visible        
        LoginPage.getErrorMessage()
        .should('be.visible')
        .and('contain', 'Invalid credentials');
        
        // Validate that we are not redirected and still on the login page
        cy.url().should('include', '/login');
        
        // Validate that no token is stored in localStorage
        cy.window().then((win) => {
            const token = win.localStorage.getItem('token');
            expect(token).to.be.null;
        });
    });
    
});