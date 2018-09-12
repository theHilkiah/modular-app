<template>
    <form method="POST" :action="action" @submit.prevent="doLogin">

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" :class="[{'is-invalid': errors.email}, 'form-control']" name="email" v-model="email" required autofocus>
                <span v-if="errors.email" class="invalid-feedback" role="alert">
                    <strong>{{ errors.email }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" :class="[{'is-invalid': errors.password}, 'form-control']" name="password" v-model="password" required>
                <span v-if="errors.password" class="invalid-feedback" role="alert">
                    <strong>{{ errors.password }}</strong>
                </span>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                    <label class="form-check-label" for="remember">
                        remember me
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a class="btn btn-link" href="/auth/passwords/reset">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>
</template>
<script>
export default {
    name: "login-user",
    props: ['action'],
    data(){
        return {
            email: '',
            password: '',
            errors: {
                email: '',
                password: '',
                message: ''
            }
        }
    },
    mounted(){

    },
    methods: {
        doLogin(form){
            let self = this, action = this.action, data = {
                email: this.email, password: this.password
            };
            console.log(action, data);
            axios.post(action, data)
                .then( res => console.log(res.data))
                .catch( err => {
                     let $err = err.response.data;
                     if($err) self.errors = $err;
                     self.errors.message = err.response.message || err.message || err;
                     console.log(err);
                });
        }
    }
}
</script>
