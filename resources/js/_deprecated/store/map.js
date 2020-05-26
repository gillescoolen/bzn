export const state = () => ({
  layer: 'biodiversiteithorst:Dagvlinders_std'
});

export const mutations = {
  set: (state, layer) => state.layer = layer
};

export const actions = {
  set: ({ commit }, layer) => commit('set', `biodiversiteithorst:${layer}`)
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
