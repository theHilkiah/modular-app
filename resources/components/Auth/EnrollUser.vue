<template>
    <form method="POST" :action="action">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Access Number</label>
                            <div class="col-md-8">
                                <input id="empno" type="text" :class="[{'is-invalid' : errors.empno }, 'form-control']"
                                    name="empno" v-model="empno" required readonly>
                                <span class="invalid-feedback" role="alert" v-if="errors.empno">
                                    <strong>{{ errors.empno }}</strong>
                                </span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Company Email</label>
                            <div class="col-md-8">
                                <input id="email" type="email" :class="[{'is-invalid' : errors.email }, 'form-control']"
                                    name="email" v-model="email" required readonly>
                                <span class="invalid-feedback" role="alert" v-if="errors.email">
                                    <strong>{{ errors.email }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Your Full Name</label>
                            <div class="col-md-8">
                                <input id="name" type="text" :class="[{'is-invalid' : errors.name }, 'form-control']"
                                    name="name" v-model="name" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.name">
                                    <strong>{{ errors.name }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                            <div class="col-md-8">
                                <input id="phone" type="text" :class="[{'is-invalid' : errors.phone }, 'form-control']"
                                    name="phone" v-model="phone" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.phone">
                                    <strong>{{ errors.phone }}</strong>
                                </span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Secondary Email</label>
                            <div class="col-md-8">
                                <input id="sec_email" type="email" :class="[{'is-invalid' : errors.sec_email }, 'form-control']"
                                    name="sec_email" v-model="sec_email" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.sec_email">
                                    <strong>{{ errors.sec_email }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                <a href="#">Strong</a> Password
                            </label>
                            <div class="col-md-8">
                                <input id="password" type="password" :class="[{'is-invalid' : errors.password }, 'form-control']"
                                    name="password" v-model="password" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.password">
                                    <strong>{{ errors.password }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-8">
                                <input id="password_confirmation" type="password" :class="[{'is-invalid' : errors.password_confirmation }, 'form-control']"
                                    name="password_confirmation" v-model="password_confirmation" required>
                                <span class="invalid-feedback" role="alert" v-if="errors.password_confirmation">
                                    <strong>{{ errors.password_confirmation }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ 'Register' }}
                                </button>
                            </div>
                        </div>
                    </form>
</template>
<script>
    export default {
        name: "enroll-user",
        props: ["action", "domain", "_token"],
        data() {
            return {
                name: "",
                phone: "",
                email: "",
                password: "",
                empno: "",
                sec_email: "",
                password_confirmation: "",

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
                this.errors.message = "";
                return this.value = value;
            },
            errors(errors){
                console.log(errors);
                if(errors.email !== undefined){
                    errors.email = errors.email.isArray()? errors.email.join('<br/>'): errors.email;
                }
                if(errors.password !== undefined){
                    errors.password = errors.password.isArray()? errors.password.join('<br/>'): errors.password;
                }
                return errors;
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
                    .then(res => window.location.reload() )
                    .catch(err => {
                        console.log(err.response);
                        let errors = err.response.data;
                        self.errors = errors.errors || {};
                        if(!self.errors.message){
                            self.errors.message = errors.message;
                        }
                    });
            }
        }
    };
</script>
