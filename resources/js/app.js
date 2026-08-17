import './bootstrap.js';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import './themes-manager.js';

Alpine.plugin(persist);
Alpine.start();
