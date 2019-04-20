import state from './state';
import { defaultMutations } from 'vuex-easy-access';

export default {
    ...defaultMutations(state)
}