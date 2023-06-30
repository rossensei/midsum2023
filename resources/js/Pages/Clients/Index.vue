<template>

    <Head title="Clients" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clients</h2>
                <input type="text" name="search" id="search" placeholder="Search..." class="px-2 py-1 rounded-full text-sm" @keydown.enter="search($event)">
                <div>
                    <Link href="/clients/create" class="button1">Create</Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-between">

                    <div class="w-[49%] mb-4" v-for="client in clients" :key="client.id">
                        <ClientCard :client="client" />
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientCard from '@/Components/ClientCard.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    clients: Array
})

const search = (ev) => {
    // console.log(ev.target.value)
    router.visit('/clients/search/' + ev.target.value)
}
</script>
