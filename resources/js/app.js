import './bootstrap';
import './main.js';
import './circle.js';

import 'bootstrap';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

