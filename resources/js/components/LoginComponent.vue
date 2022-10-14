<template>
    <div>
        <ValidationObserver ref="observer" v-slot="{invalid}">
            <v-row justify="center" class="mt-12 mb-12">
                <v-col
                    cols="12"
                    lg="6"
                    md="8"
                    sm="10"
                >
                    <v-card ref="form" class="pa-12">
                        <v-card-text>
                            <ValidationProvider v-slot="{errors}" name="Full Name" rules="required" v-if="location=='/register'">
                                <v-text-field
                                    v-model="name"
                                    :error-messages="errors"
                                    label="Full Name"
                                    required
                                ></v-text-field>
                            </ValidationProvider>
                            <ValidationProvider v-slot="{errors}" name="Email Address" rules="required|email">
                                <v-text-field
                                    v-model="email"
                                    :error-messages="errors"
                                    :rules="emailRules"
                                    label="Email Address"
                                    required
                                ></v-text-field>
                            </ValidationProvider>
                            <ValidationProvider v-slot="{errors}" name="Password" rules="required">
                                <v-text-field
                                    v-model="password"
                                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                    :type="show1 ? 'text' : 'password'"
                                    :error-messages="errors"
                                    counter
                                    hint="At least 8 characters"
                                    label="Enter Password"
                                    name="input-10-1"
                                    @click:append="show1 = !show1"
                                ></v-text-field>
                            </ValidationProvider >
                            <v-text-field
                                v-if="location=='/register'"
                                :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                :type="show2 ? 'text' : 'password'"
                                class="input-group--focused"
                                hint="At least 8 characters"
                                label="Confirm Password"
                                name="input-10-2"
                                @click:append="show2 = !show2"
                            ></v-text-field>

                        </v-card-text>
                        <v-divider class="mt-12"></v-divider>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="primary"
                                text
                                @click="submit"
                            >
                                Submit
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </ValidationObserver>
    </div>
</template>

<script>
export default {
    name: "LoginComponent",
    data () {
        return {
            show1: false,
            show2: false,
            password:null,
            errors:'',
            name:null,
            email:null,
            // minRules: [
            //     v => v.length >= 8 || 'Min 8 characters',
            // ],
            emailRules: [
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
            location:null,
        }
    },
    methods:{
        submit(){
            console.log(this.location)
            this.$refs.observer.validate().then(response => {
                if (response) {
                    let data= {
                        'name': this.name,
                        'email': this.email,
                        'password': this.password,
                    }
                    axios.post(this.location, data).then((result)=>{
                        if(result.data.data.message == 'success'){
                            this.$router.push({path:`/`})
                        }
                    })


                }
            })
        }
    },
    mounted() {
        this.location = window.location.pathname;
    }
}
</script>

<style scoped>

</style>
