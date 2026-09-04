<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * Garde-fou contre la classe de panne qui rendait /components entierement vide.
 *
 * Blade compile les balises <x-...> meme a l'interieur d'un <script>. Une seule
 * balise laissee dans un template literal suffisait a y injecter du HTML rendu
 * contenant un backtick, ce qui cassait la syntaxe des 62 Ko de script et
 * empechait componentsPage() d'exister : la galerie affichait 0 composant sur
 * 86, sans qu'aucun outil de la CI ne s'en apercoive.
 */
class ComponentsPageTest extends TestCase
{
    public function test_components_page_renders(): void
    {
        $this->get('/components')->assertOk();
    }

    public function test_inline_scripts_are_syntactically_valid_javascript(): void
    {
        $html = $this->get('/components')->getContent();
        $this->assertIsString($html);

        $scripts = $this->inlineScripts($html);
        $this->assertNotEmpty($scripts, 'Aucun script inline trouve : le selecteur a probablement change.');

        foreach ($scripts as $index => $script) {
            [$ok, $error] = $this->checkJavaScript($script);

            $this->assertTrue(
                $ok,
                "Le script inline #{$index} de /components n'est pas du JavaScript valide : {$error}"
            );
        }
    }

    public function test_gallery_declares_every_component_block(): void
    {
        $html = $this->get('/components')->getContent();
        $this->assertIsString($html);

        preg_match_all("/\{ key: '([a-z0-9-]+)'/", $html, $matches);

        $keys = array_unique($matches[1]);

        $this->assertGreaterThanOrEqual(
            86,
            count($keys),
            'La galerie declare moins de blocs qu\'attendu : un composant a disparu du catalogue.'
        );
    }

    public function test_examples_page_renders_with_valid_scripts(): void
    {
        $html = $this->get('/examples')->assertOk()->getContent();
        $this->assertIsString($html);

        foreach ($this->inlineScripts($html) as $index => $script) {
            [$ok, $error] = $this->checkJavaScript($script);

            $this->assertTrue($ok, "Le script inline #{$index} de /examples est invalide : {$error}");
        }
    }

    /**
     * Contenu de chaque <script> sans attribut src.
     *
     * @return list<string>
     */
    private function inlineScripts(string $html): array
    {
        preg_match_all('/<script(?![^>]*\bsrc=)[^>]*>(.*?)<\/script>/s', $html, $matches);

        return array_values(array_filter(
            array_map('trim', $matches[1]),
            static fn (string $script): bool => $script !== ''
        ));
    }

    /**
     * Valide un fragment JavaScript avec `node --check`.
     *
     * @return array{0: bool, 1: string}
     */
    private function checkJavaScript(string $script): array
    {
        $path = tempnam(sys_get_temp_dir(), 'larappeui-').'.js';
        file_put_contents($path, $script);

        $descriptors = [1 => ['pipe', 'w'], 2 => ['pipe', 'w']];
        $process = proc_open(['node', '--check', $path], $descriptors, $pipes);

        if (! is_resource($process)) {
            @unlink($path);
            $this->markTestSkipped('Node est indisponible : impossible de valider le JavaScript genere.');
        }

        $stderr = stream_get_contents($pipes[2]) ?: '';
        fclose($pipes[1]);
        fclose($pipes[2]);
        $status = proc_close($process);

        @unlink($path);

        return [$status === 0, trim($stderr)];
    }
}
