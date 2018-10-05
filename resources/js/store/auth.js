import router from  '../router'

// Possible mutations
const types = {
    LOGIN: 'LOGIN',
    LOGOUT: 'LOGOUT'
};

// Possible states
const state = {
    logged: !!localStorage.getItem('token')
};

// Mutation definition
const mutations = {
    [types.LOGIN](state){
        state.logged = true
    },
    [types.LOGOUT](state){
        state.logged = false
    }
};

// Getters

const getters = {
    isLogged: (state) => {
        return state.logged
    }
};

const actions = {
    login({commit}, token){
        commit(types.LOGIN);
        localStorage.setItem('token', token);
        router.push({name: 'home'});
    },
    logout({commit}){
        commit(types.LOGOUT);
        localStorage.removeItem('token');
        router.push({name: 'signin'});
    }
};

export default {
    state,
    mutations,
    getters,
    actions
}