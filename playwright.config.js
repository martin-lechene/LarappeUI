import { defineConfig, devices } from '@playwright/test';

const PORT = process.env.E2E_PORT ?? 8901;

export default defineConfig({
  testDir: './tests/e2e',
  fullyParallel: true,
  forbidOnly: !!process.env.CI,
  retries: process.env.CI ? 1 : 0,
  workers: process.env.CI ? 2 : undefined,
  reporter: process.env.CI ? [['github'], ['list'], ['html', { open: 'never' }]] : [['list']],

  use: {
    baseURL: `http://127.0.0.1:${PORT}`,
    trace: 'on-first-retry',
    screenshot: 'only-on-failure',
  },

  projects: [{ name: 'chromium', use: { ...devices['Desktop Chrome'] } }],

  // Les assets doivent être buildés au préalable (`npm run build`).
  // `PHP_CLI_SERVER_WORKERS` : le serveur de développement traite sinon une
  // seule requête à la fois et sature dès que plusieurs tests s'exécutent en
  // parallèle (chaque changement de thème émet un POST /theme/set).
  webServer: {
    command: `php artisan serve --port=${PORT} --no-reload`,
    url: `http://127.0.0.1:${PORT}/components`,
    reuseExistingServer: !process.env.CI,
    timeout: 120_000,
    env: { PHP_CLI_SERVER_WORKERS: '8' },
  },
});
