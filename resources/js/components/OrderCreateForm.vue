<template>
    <form id="create-form" action="/order/create" method="post" @submit.prevent="createOrder">
        <input type="hidden" name="_token" :value="csrf">
        <div class="mb-3 row">
            <div class="col-3"><label for="vehicle" class="form-label">Select Vehicle</label></div>
            <div class="col-9">
                <select id="vehicle" name="vehicle" @change="populateKeys" v-model="formData.vehicle_id">
                    <option value="">Select A Vehicle</option>
                    <option
                        v-for="vehicle in vehicles"
                        :key="vehicle.id"
                        :value="vehicle.id"
                    >{{ vehicle.make }} {{vehicle.model}} ({{vehicle.year}})</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-3">
                <label for="key" class="form-label">Select Key</label>
            </div>
            <div class="col-9">
                <select id="key" name="key" v-model="formData.key_id">
                    <option value="">Select A Key</option>
                    <option
                        v-for="key in keys"
                        :key="key.id"
                        :value="key.id"
                    >{{key.name}} (${{key.price}})</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-3">
                <label for="technicians" class="form-label">Select Technician</label>
            </div>
            <div class="col-9">
                <select id="technicians" name="technician" v-model="formData.technician_id">
                    <option
                        v-for="tech in technicians"
                        :key="tech.id"
                        :value="tech.id"
                    >{{tech.formatted_name}}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-9"><button class="btn btn-primary" type="submit">Create Order</button></div>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        'vehicles':{
            type: Array,
            default:[]
        },
        'technicians':{
            type: Array,
            default:[]
        }
    },
    data() {
        return {
            keys: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            formData: {
                vehicle_id: '',
                key_id: '',
                technician_id: ''
            }
        }
    },
    mounted() {
    },
    methods: {
        populateKeys(val) {
            var vehicleId = val.target.selectedOptions[0].value;
            if (!vehicleId) {
                return;
            }
            axios({
                method: 'get',
                url: '/vehicle/'+vehicleId+'/keys',

            }).then((response)=>{
                this.keys = response.data;
            });
        },
        createOrder(val) {
             axios.post('/orders', this.formData
             ).catch(function(error) {
                 //TODO: handle error response on form
                 console.log(error);
                 }
             ).then((response)=>{
                 window.location.href = '/';
             })
             ;
        }
    }
}
</script>
