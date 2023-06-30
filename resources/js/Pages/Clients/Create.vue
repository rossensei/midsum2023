<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
// import { onUpdated, onMounted, watch } from 'vue';

const form = useForm({
    last_name: '',
    first_name: '',
    address: '',
    phone: '',
    bdate: '',
    bio: '',
    profile_pic: ''
})

function submit() {
    form.post('/clients')
}

// watch(form, (newValue, oldValue) => {
//     console.log(newValue)
// })
</script>

<template>
    <Head title="Create Client" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">Create Client</h2>
                <Link class="button1 mb-2" as="button" href="/clients">Back</Link>
            </div>
        </template>

        <div class="py-6">
            <div class="bg-white max-w-4xl p-4 mx-auto rounded-lg border">
                <form @submit.prevent="submit" class="flex">
                    <div class="flex-1 pr-4">
                        <h4 class="text-xl mb-4">Personal Details</h4>
                        <div class="form-field">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" v-model="form.last_name">
                        </div>

                        <div class="form-field">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" v-model="form.first_name">
                        </div>

                        <div class="form-field">
                            <label for="address">Address</label>
                            <input type="text" id="address" v-model="form.address">
                        </div>

                        <div class="form-field">
                            <label for="bdate">Birth Date</label>
                            <input type="date" id="bdate" v-model="form.bdate">
                        </div>

                        <div class="form-field">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" v-model="form.phone">
                        </div>

                        <div class="form-field">
                            <label for="phone">Add profile picture</label>
                            <input type="file" id="phone" @input="form.profile_pic = $event.target.files[0]">
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <h4 class="text-xl">Biography</h4>
                        <textarea cols="30" v-model="form.bio" class="flex-1 border border-gray-400 rounded "></textarea>
                        <button class="button1 mt-2" type="submit">Create Client</button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
