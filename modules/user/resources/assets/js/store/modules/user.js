import { defaultMutations } from 'vuex-easy-access';
import { APP_CONFIG } from '@modules/base/resources/assets/js/config';
import  UserAPI from './../../api/user';

const state = {
    user: {},
    userLoadStatus: 0,
    userUpdateStatus: 0
};

const mutations = {
    ...defaultMutations(state)
};

const getters = {
    getUser: state => () => state.user
};

const actions = {
    getUser({ commit }) {
        commit('userLoadStatus', 1);

        UserAPI.getUser().then((response) => {
            commit('userLoadStatus', 2);
            commit('user', response.data.data);
        }).catch(function (e) {
            if (e.request && e.request.status && e.request.status === 401) {
                //Done
                commit('userLoadStatus', 2);
            } else {
                commit('userLoadStatus', 3)
            }
        });
    },
};

export default {
    state,
    mutations,
    actions,
    getters
}
