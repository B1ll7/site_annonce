<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_c6579ca012973f2d4c8ea1dc53ee45e3630b3a59ac33f9ea098ac980f0383f27 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!Doctype html>
<html>
    <head></head>
    <body>
        ";
        // line 5
        $this->displayBlock('content', $context, $blocks);
        // line 6
        echo "    </body>
</html>";
    }

    // line 5
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  51 => 5,  46 => 6,  44 => 5,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "D:\\projetAfpa\\annonce\\views\\base.html.twig");
    }
}
