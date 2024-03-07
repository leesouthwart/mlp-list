import('./bootstrap');

import { Notyf } from 'notyf';

const notyf = new Notyf({
    duration: 2000,
    position: {
        x: 'center',
        y: 'top',
    }
});

window.livewire.on('notifySuccess', (message) => {
    notyf.success(message);
});

window.livewire.on('notifyError', (message) => {
    notyf.error(message);
});
