export const state = () => ({
  layer: ''
});

export const mutations = {
  set: (state, layer) => state.layer = layer
};

export const actions = {
  set: ({ commit }, layer) => commit('set', layer)
};

export const getters = {
  get: state => state.layer
};

export default {
  state,
  mutations,
  actions,
  getters,
  namespaced: true
};
