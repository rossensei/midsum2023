<template>

    <div class="rounded-lg p-4 border-2 border-gray-400 bg-white shadow flex hover:bg-blue-100">
        <div class="cursor-pointer flex flex-1" @click="open(client)">
            <div class="w-[200px] h-auto border flex justify-center items-center bg-gray-300 text-center">
                <img :src="props.client.profile_pic_url" alt="">
            </div>
            <div class="ml-4 flex-1">
                <h3 class="font-bold">
                    Client Details
                </h3>
                <hr>
                <div class="text-2xl">{{ client.last_name }}, {{ client.first_name }}</div>
                <div class="italic">{{ client.address }}</div>
                <div class="italic">{{ client.phone }}</div>
                <div class="mt-2">{{ client.formattedBDate }}</div>
                <label class="relative inline-flex items-center cursor-pointer" :for="'status-' + client.id ">
                <input type="checkbox" :checked="client.active" :id="'status-' + client.id" @change="toggleActive(client)" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active</span>
                </label>
            </div>
        </div>
        
    </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object
})

console.log(props.client)

function open(client) {
    router.visit('/clients/' + client.id)
}

const toggleActive = (client) => {
    router.visit('/clients/toggle/' + client.id, {
        method: 'post',
        preserveScroll: true
    })
}

</script>
