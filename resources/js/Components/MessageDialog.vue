<script setup>
const prop = defineProps({
    messages: Object
})

const hideDialog = () => {
    if(prop.messages.error) {
        prop.messages.error = null
    }else if(prop.messages.info) {
        prop.messages.info = null
    }
}
</script>

<template>
    <div v-if="prop.messages.error" class="absolute top-0 w-full min-h-screen bg-gray-700 opacity-50"></div>

    <div v-if="prop.messages.error" class="z-10 absolute top-0 w-full min-h-screen flex justify-center items-center">
        <div class="bg-gray-50 rounded-lg w-1/4 p-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 text-red-600">
                    <i class="fa-solid fa-triangle-exclamation text-5xl"></i>
                    <span class="text-md font-normal text-red-600">{{ prop.messages.error }}</span>
                </div>
                <button @click="hideDialog"><i class="fa-sharp fa-solid fa-xmark"></i></button>
            </div>
        </div>
    </div>

    <div v-if="prop.messages.info" class="absolute top-0 w-full min-h-screen bg-gray-700 opacity-50"></div>

    <div v-if="prop.messages.info" class="z-10 absolute top-0 w-full min-h-screen flex justify-center items-center">
        <div class="bg-gray-50 rounded-lg w-1/4 p-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fa-solid fa-circle-info text-5xl text-blue-600"></i>
                    <span class="text-md font-normal text-gray-600">{{ prop.messages.info }}</span>
                </div>
                <button @click="hideDialog"><i class="fa-sharp fa-solid fa-xmark"></i></button>
            </div>
        </div>
    </div>

    
</template>