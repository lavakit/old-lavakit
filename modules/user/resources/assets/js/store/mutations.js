import state from './state';
import { defaultMutations } from '@packages/vuex-easy-access';

export default {
    ...defaultMutations(state)
}