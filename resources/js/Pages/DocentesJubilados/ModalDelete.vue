<template>
<TransitionRoot as="template" :show="open">
<Dialog as="div" class="relative z-10"  @close="closeModal">
    <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-500 dark:bg-gray-900 opacity-75 transition-opacity" />
    </TransitionChild>

    <div class="fixed inset-0 z-10 overflow-y-auto ">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <DialogPanel class="relative transform overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class=" px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
<!--                                <ExclamationTriangleIcon  aria-hidden="true" />-->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>

                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <DialogTitle as="h3" class="text-lg font-semibold leading-6 text-gray-900 dark:text-gray-100">Eliminar Docente: {{docenteJubilado.apellido_paterno}}</DialogTitle>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">¿Está seguro de que desea eliminar este docente? Esta acción no se puede deshacer</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="m-6 flex justify-end">
                        <SecondaryButton @click="closeModal"> Cancelar </SecondaryButton>

                        <DangerButton
                            class="mx-3"
                            @click="deleteUser()"
                        >
                            Eliminar Docente
                            <svg v-if="isDeleting" class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </DangerButton>
                    </div>

                </DialogPanel>
            </TransitionChild>
        </div>
    </div>
</Dialog>
</TransitionRoot>
</template>

<script setup>
import { ref } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { router } from '@inertiajs/vue3'

// const open = ref(false)
const props = defineProps(['open', 'docenteJubilado'])

const emit =  defineEmits(['closeModal'])

const deleteUser = async () => {
    try {
        startDeleting();
        router.delete(route('docentes-jubilados.destroy', { id: props.docenteJubilado.id }), {preserveScroll: true})
        closeModal()
    } catch (error) {
        console.error(error)
    }
};

function closeModal() {
    emit('closeModal')
}


const isDeleting = ref(false);

const startDeleting = () => {
    isDeleting.value = true;
};
</script>
