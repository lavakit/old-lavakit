import cameCase from 'lodash/camelCase';

const requireModule = require.context('.', false, /\.js$/);
const modules = {};

requireModule.keys().forEach((fileName) => {
    if (fileName === './index.js') {
        return;
    }

    const moduleName = cameCase(fileName.replace(/(\.\/|\.js)/g, ''));

    modules[moduleName] = {
        namespace: true,
        ...requireModule(fileName).default,
    }
});

export default modules;
