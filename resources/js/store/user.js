export const state = () => ({
    user: {
        name: '',
        email: '',
        role: ''
    }
});

export const mutations = {
    set: (state, user) => state.user = user
}

export const actions = {
    set: ({ commit }, user) => commit('set', user)
}

export const getters = {
    get: state => state.user
}

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}