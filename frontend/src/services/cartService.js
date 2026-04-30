import axios from 'axios';

const API_URL = 'http://localhost:8000/api/cart';

const getAuthHeaders = () => ({
  Authorization: `Bearer ${localStorage.getItem('token')}`
});

export const getCart = async () => {
  const response = await axios.get(API_URL, {
    headers: getAuthHeaders()
  });

  return response.data;
};

export const addToCart = async (productId) => {
  const response = await axios.post(
    `${API_URL}/items`,
    {
      product_id: productId
    },
    {
      headers: getAuthHeaders()
    }
  );

  return response.data;
};

export const removeFromCart = async (itemId) => {
  const response = await axios.delete(
    `${API_URL}/items/${itemId}`,
    {
      headers: getAuthHeaders()
    }
  );

  return response.data;
};