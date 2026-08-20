import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import { marked } from 'marked';
import Prism from 'prismjs';
import 'prismjs/themes/prism-tomorrow.css';
import 'prismjs/components/prism-markup';
import 'prismjs/components/prism-css';
import 'prismjs/components/prism-javascript';
import 'prismjs/components/prism-php';

import { registerComponents } from './alpine/index.js';
import './themes-manager.js';

// Exposés pour les composants Blade qui les utilisent depuis Alpine
// (`markdown-editor` pour marked, blocs `<pre class="language-*">` pour Prism).
window.Prism = Prism;
window.marked = marked;

Alpine.plugin(persist);
registerComponents(Alpine);
Alpine.start();

document.addEventListener('DOMContentLoaded', () => Prism.highlightAll());
