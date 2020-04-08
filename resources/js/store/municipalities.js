export const state = () => ({
    selected: {
        id: 0,
        name: 'Horst',
        longitude: 6.0303174,
        latitude: 51.4232255
    },
});

export const mutations = {
    set: (state, municipality) => state.selected = municipality
}

export const actions = {
    set: ({ commit }, municipality) => commit('set', municipality)
}

export const getters = {
    get: state => state.selected
}

export default {
    state,
    mutations,
    actions,
    getters,
    namespaced: true
}