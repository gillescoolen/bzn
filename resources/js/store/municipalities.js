export const state = () => ({
    selected: null,
});

export const mutations = {
    set(state, municipality) {
        state.selected = municipality
    }
}

export const actions = {
    set({ commit }, municipality) {
        commit('set', municipality);
    }
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