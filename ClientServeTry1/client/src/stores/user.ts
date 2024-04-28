import { computed } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios';

export const useUser = defineStore('counter', () => {
  const token = computed(() => localStorage.getItem('token'));
  const name = computed(() => localStorage.getItem('name'));

  const login = async (email: string, password: string) => {
    return await axios.post('/auth/login', {
      email: email,
      password: password
    }).then(({ data }) => {
      localStorage.setItem('token', data.users.accessToken)
      localStorage.setItem('name', data.users.name)
    }).catch(()=>{
      console.log("Login failed")
    })
  }

  const logout = () => {
    
  }

  const verify = () => {
    
  }
  
  return { name, token, login, logout, verify }
})
