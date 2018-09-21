<template>
    <form method="POST" :action="action" @submit.prevent="doLogin">

        <fieldset>
            <div class="form-group">
                <div :class="[{'is-invalid': errors.email}, 'input-group']">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <input id="email" type="text" name="email" class="form-control" v-model="email" required autofocus>
                    <!-- <div class="input-group-prepend"><div class="input-group-text">@{{ domain }}</div></div> -->
                </div>
                <span v-if="errors.email" class="invalid-feedback" role="alert">
                    <strong>{{ errors.email }}</strong>
                </span>
            </div>
            <div class="form-group">
                <div :class="[{'is-invalid': errors.password}, 'input-group']">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-lock"></i></div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" v-model="password"
                        required>
                </div>
                <span v-if="errors.email" class="invalid-feedback" role="alert">
                    <strong>{{ errors.email }}</strong>
                </span>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <div class="form-check py-2">
                        <input class="form-check-input my-1" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-outline-primary btn-block">
                        Login
                    </button>
                </div>
            </div>

        </fieldset>
    </form>
</template>
<script>
    export default {
        name: "login-user",
        props: ["action", "domain"],
        data() {
            return {
                email: "",
                password: "",
                errors: {
                    email: "",
                    password: "",
                    message: ""
                }
            };
        },
        mounted() {},
        watch: {
            email(value) {
                if (value.indexOf('@') == value.length - 1) {
                    value += this.domain;
                }
                return this.value = value;
            }
        },
        methods: {
            doLogin(form) {
                let self = this;
                axios
                    .post(self.action, {
                        email: self.email,
                        password: self.password
                    })
                    .then(res => console.log(res.data))
                    .catch(err => {
                        self.errors = err.response.data.errors || err;
                    });
            }
        }
    };
</script>
