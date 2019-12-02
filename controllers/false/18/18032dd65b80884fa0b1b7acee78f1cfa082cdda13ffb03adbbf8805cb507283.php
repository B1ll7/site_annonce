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

/* showAcceuil.html.twig */
class __TwigTemplate_76ec4f860845abb81261f2f4eaa0a05072709244289735f2d802ad5233a8a151 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "showAcceuil.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "    <ul>
      <li><a href='\".\$url.\"?action=afficherRubriques'>afficherRubriques</a></li>
      <li><a href='\".\$url.\"?action=ajouterRubrique'>ajouterRubrique</a></li>
      <li><a href='\".\$url.\"?action=identifierUtilisateur'>identifierUtilisateur</a></li>
      <li><a href='\".\$url.\"?action=creerUtilisateur'>creerUtilisateur</a></li>
    </ul>
  ";
    }

    public function getTemplateName()
    {
        return "showAcceuil.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "showAcceuil.html.twig", "D:\\projetAfpa\\annonce\\views\\showAcceuil.html.twig");
    }
}
