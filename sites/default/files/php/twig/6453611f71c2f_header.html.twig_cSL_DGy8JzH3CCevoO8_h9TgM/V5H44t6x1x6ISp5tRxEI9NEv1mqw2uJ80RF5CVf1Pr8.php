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

/* @mili/template-parts/header.html.twig */
class __TwigTemplate_d9de247d91de400378cd98cbab03b2e1094d8c5dd9086b436d26c1c0d71c2b20 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!-- Start: Header -->
<header class=\"header\">
  <div class=\"header-main\">
  <div class=\"container\">
    <div class=\"header-main-container\">
      ";
        // line 6
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 6)) {
            // line 7
            echo "        <div class=\"site-brand\">
          ";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "
        </div> <!--/.site-branding -->
      ";
        }
        // line 11
        echo "      <div class=\"header-right\">
        ";
        // line 12
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 12)) {
            // line 13
            echo "          <div class=\"mobile-menu\">
            <i class=\"icon-bars\" aria-hidden=\"true\"></i>
          </div>
          <div class=\"primary-menu-wrapper\">
            <div class=\"menu-wrap\">
              <div class=\"close-mobile-menu\">x</div>
              ";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "
            </div>
          </div>
        ";
        }
        // line 22
        echo "<!-- End: primary menu region -->
        ";
        // line 23
        $this->loadTemplate("@mili/template-parts/search.html.twig", "@mili/template-parts/header.html.twig", 23)->display($context);
        // line 24
        echo "      </div> <!-- /.header-right -->
    </div> <!-- /.header-main-container -->
  </div> <!-- /.container -->
  </div> <!-- /.header-main -->
  ";
        // line 28
        if ((($context["is_front"] ?? null) && ($context["slider_show"] ?? null))) {
            // line 29
            echo "    ";
            $this->loadTemplate("@mili/template-parts/slider.html.twig", "@mili/template-parts/header.html.twig", 29)->display($context);
            // line 30
            echo "  ";
        } elseif ( !($context["is_front"] ?? null)) {
            // line 31
            echo "    ";
            $this->loadTemplate("@mili/template-parts/page_header.html.twig", "@mili/template-parts/header.html.twig", 31)->display($context);
            // line 32
            echo "  ";
        }
        // line 33
        echo "</header>
<!-- End: Header -->
";
    }

    public function getTemplateName()
    {
        return "@mili/template-parts/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 33,  99 => 32,  96 => 31,  93 => 30,  90 => 29,  88 => 28,  82 => 24,  80 => 23,  77 => 22,  70 => 19,  62 => 13,  60 => 12,  57 => 11,  51 => 8,  48 => 7,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@mili/template-parts/header.html.twig", "C:\\xampp\\htdocs\\nse\\themes\\contrib\\mili\\templates\\template-parts\\header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 6, "include" => 23);
        static $filters = array("escape" => 8);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
