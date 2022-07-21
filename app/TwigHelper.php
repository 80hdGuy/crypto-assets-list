<?php



namespace App;

use Twig;

class TwigHelper
{
    static public function generatePage(string $pageTemplatePath, array $data = []): string
    {
        $loader = new Twig\Loader\FilesystemLoader(
            pathinfo($pageTemplatePath,PATHINFO_DIRNAME)
        );
        $twigEnvironment = new Twig\Environment($loader);
        return $twigEnvironment->render(
            pathinfo($pageTemplatePath,PATHINFO_BASENAME),
            $data
        );
    }
}