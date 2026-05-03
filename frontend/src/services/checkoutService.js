import axios from 'axios';

const API_URL = 'http://localhost:8000/api/checkout';

const getAuthHeaders = () => ({
  Authorization: `Bearer ${localStorage.getItem('token')}`
});

export const checkout = async () => {
  const response = await axios.post(
    API_URL,
    {},
    {
      headers: getAuthHeaders()
    }
  );

  return response.data;
};