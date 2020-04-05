export const state = () => ({
    selected: {
        id: 0,
        name: 'Amsterdam',
        longitude: 4.895168,
        latitude: 52.370216
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