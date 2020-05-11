export const state = () => ({
    type: null
});

export const mutations = {
    set: (state, type) => state.type = type
}

export const actions = {
    set: ({ commit }, type) => commit('set', type)
}

export const getters = {
    get: state => state.type
}

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}