<template>
    <form @submit="submitForm">
        <div v-if="previewURL" class="mb-3">
            <img
                :src="previewURL"
                alt="Image Preview"
                class="img-thumbnail"
                style="max-width: 300px"
            />
        </div>
        <div class="form-group">
            <label for="customFile">Upload File</label>
            <div class="custom-file">
                <input
                    type="file"
                    accept="image/*"
                    class="custom-file-input"
                    id="customFile"
                    @change="handleFileChange"
                />
                <label class="custom-file-label" for="customFile">{{
                    fileName || "Choose file"
                }}</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
<script lang="ts">
import { ref } from "vue";
import { router, usePage } from "@inertiajs/vue3";
export default {
    setup() {
        const file = ref<File | null>(null);
        const fileName = ref("");
        const previewURL = ref("");
        const handleFileChange = (event: Event) => {
            const target = event.target as HTMLInputElement;
            const selectedFile = target.files ? target.files[0] : null;
            if (selectedFile) {
                file.value = selectedFile as File;
                fileName.value = selectedFile.name;
                previewURL.value = URL.createObjectURL(selectedFile);
            }
        };

        const submitForm = (e: Event) => {
            e.preventDefault();
            if (file.value) {
                router.post(
                    route("media.store"),
                    {
                        _token: usePage().props._token,
                        file: file.value,
                    },
                    {
                        replace: true,
                    }
                );
            }
        };

        return {
            file,
            fileName,
            previewURL,
            handleFileChange,
            submitForm,
        };
    },
};
</script>
<style lang=""></style>
