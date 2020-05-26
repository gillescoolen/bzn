export const state = () => ({
  color: '#568c65'
});

export const mutations = {
  setColor: (state, color) => state.color = color
};

export const actions = {
  setColor: ({ commit }, color) => commit('setColor', color)
};

export const getters = {
  color: state => state.color
};

export default {
  state,
  mutations,
  actions,
  getters,
  namespaced: true
};
