import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './Apps/App';

document.addEventListener('DOMContentLoaded', function (){
    const container = document.getElementById('ShadCdn_connect');
    if ( container ){
        const root = createRoot(container);
        root.render(<App/>)
    }
});