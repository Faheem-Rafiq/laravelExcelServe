<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    users: {
        type: Object,
        required: true,
    },
});
</script>

<script>
import { router } from '@inertiajs/vue3'
export default {
    data() {
        return {
            file: null,
        };
    },
    methods: {
        onFileChange(event) {
            this.file = event.target.files[0];
        },
        async uploadFile() {
            const formData = new FormData();
            formData.append("file", this.file);

            try {
                router.post("/import", formData);
                console.log("File uploaded successfully.");
            } catch (error) {
                console.error(error);
            }
        },
    },
};
</script>

<template>
    <AppLayout title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container mx-auto w-96 p-10">
                        <form @submit.prevent="uploadFile">
                            <div class="mb-4">
                                <label
                                    for="file"
                                    class="block text-gray-700 font-bold mb-2"
                                    >Choose a file to upload:</label
                                >
                                <input
                                    type="file"
                                    id="file"
                                    class="w-full p-2 rounded-md border border-gray-400"
                                    @change="onFileChange"
                                />
                            </div>
                            <button
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            >
                                Upload
                            </button>
                        </form>
                    </div>
                    <div class="w-full">
                        <table>
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
 table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
      }
      th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
      }
      th {
        background-color: #282a35;
        font-size: 18px;
		color:#fff;
        font-weight: bold;
      }
      td {
        font-size: 16px;
      }
      tr:hover {
		color:#fff;
        background-color: #04aa6d;
      }
</style>
