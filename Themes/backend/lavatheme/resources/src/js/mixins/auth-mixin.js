export const AuthMixin = {
    methods: {
        hasRole(userObject, roleName) {
            let roles =  this.getRoles(userObject);

            return roles.includes(roleName);
        },
        getRoles(userObject) {
            let roles = [];
            for (let roleObject of userObject.roles) {
                roles.push(roleObject.name);
            }

            return roles;
        }
    }
};
