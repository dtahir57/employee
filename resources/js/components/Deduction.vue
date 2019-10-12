<template>
    <div class="card mt-4">
        <div class="card-header">Deduction Per Holiday</div>
        <div class="card-body">
            <div v-if="!this.deduction">
                <div class="form-group">
                    <input type="number" class="form-control" v-model="deduction_fee" placeholder="Deduction Per Holiday" />
                    <p class="text-danger" v-if="this.deduction_error">Please Provide Deduction Fee</p>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="Save" @click="save" />
                </div>
            </div>
            <div v-else>
                <tr v-show="!editing">
                    <td width="80%">{{ deduction.deduction }}/- Rs</td>
                    <td width="20%"><button class="btn btn-sm btn-primary" @click="openEdit">Edit</button></td>
                </tr>
                <div v-show="editing">
                    <div class="form-group">
                        <input type="number" class="form-control" v-model="deduction.deduction" placeholder="Deduction Per Holiday" />
                        <p class="text-danger" v-if="this.deduction_error">Please Provide Deduction Fee</p>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="Update" @click="update" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                deduction: null,
                deduction_fee: null,
                deduction_error: false,
                editing: false
            }
        },
        methods: {
            save () {
                if (this.deduction_fee) {
                    this.deduction_error = false
                    let uri = '/api/deduction/save';
                    axios.post(uri, {
                        deduction: this.deduction_fee
                    }).then(response => {
                        this.deduction = response.data.deduction
                    }).catch(error => {
                        console.log(error)
                    })
                } else {
                    this.deduction_error = true
                }
            },
            openEdit()
            {
                this.editing = true
            },
            update() {
                if (this.deduction.deduction) {
                    this.deduction_error = false
                    let uri = '/api/deduction/update';
                    axios.post(uri, {
                        deduction: this.deduction.deduction
                    }).then(response => {
                        this.deduction = response.data.deduction
                    }).catch(error => {
                        console.log(error)
                    })
                    this.editing = false
                } else {
                    this.deduction_error = true
                }
            }
        },
        created () {
            let uri = '/api/deduction';
            axios.get(uri).then(response => {
                console.log(response)
                this.deduction = response.data.deduction
            }).catch(error => {
                console.log(error)
            })
        }
    }
</script>
