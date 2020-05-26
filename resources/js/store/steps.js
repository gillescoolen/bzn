export const state = () => ({
  color: '#568c65',
    municipalityID: '1'
});

export const mutations = {
  setColor: (state, color) => state.color = color,
    setMunicipalityID: (state, municipalityID) => state.municipalityID = municipalityID
}

export const actions = {
  setColor: ({ commit }, color) => commit('setColor', color),
  setMunicipalityID: ({ commit }, MunicipalityID) => commit('setMunicipalityID', MunicipalityID)
}

export const getters = {
  color: state => state.color
}

export default {
  state,
  mutations,
  actions,
  getters,
  namespaced: true
}
