export const state = () => ({
    user: null,
    role: null,
    token: null
});

export const mutations = {
    user: (state, user) => state.user = user,
    role: (state, role) => state.role = role,
    token: (state, token) => state.token = token
}

export const actions = {
    user: ({ commit }) => commit('user', user),
    role: ({ commit }) => commit('role', role),
    token: ({ commit }) => commit('token', token)

}

export const getters = {
    user: state => state.user,
    role: state => state.role,
    token: state => state.token
}

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}