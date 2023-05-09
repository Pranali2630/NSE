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

/* @mili/template-parts/footer.html.twig */
class __TwigTemplate_0267346b20d6d757fbfc86e5b677a6005f5d5ac3a3bfbfc22034005b931b8371 extends \Twig\Template
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
        echo "<!-- Start: Footer -->
<footer class=\"footer\">
  <div class=\"container\">
  ";
        // line 4
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 4)) {
            // line 5
            echo "    <section class=\"footer-top\">
      ";
            // line 6
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_top", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "
    </section>
  ";
        }
        // line 8
        echo "<!-- /footer-top -->

  ";
        // line 10
        if ((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 10) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 10)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 10)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 10))) {
            // line 11
            echo "    <section class=\"footer-blocks\">
      ";
            // line 12
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 12)) {
                // line 13
                echo "        <div class=\"footer-block\">
          ";
                // line 14
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
                echo "
        </div> <!--/footer-first -->
      ";
            }
            // line 17
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 17)) {
                // line 18
                echo "        <div class=\"footer-block\">
          ";
                // line 19
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
                echo "
        </div> <!--/footer-second -->
      ";
            }
            // line 22
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 22)) {
                // line 23
                echo "        <div class=\"footer-block\">
          ";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "
        </div> <!--/footer-third -->
      ";
            }
            // line 27
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 27)) {
                // line 28
                echo "        <div class=\"footer-block\">
          ";
                // line 29
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_fourth", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo "
        </div> <!--/footer-fourth -->
      ";
            }
            // line 31
            echo "  
    </section> <!--/footer-blocks -->
  ";
        }
        // line 33
        echo " ";
        // line 34
        echo "    ";
        if ((($context["copyright_text"] ?? null) || ($context["all_icons_show"] ?? null))) {
            // line 35
            echo "    <section class=\"footer-bottom-section\">
      ";
            // line 36
            if (($context["copyright_text"] ?? null)) {
                // line 37
                echo "        <div class=\"copyright\">
          &copy; ";
                // line 38
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
                echo " ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 38, $this->source), "html", null, true);
                echo ", All rights reserved.
        </div>
      ";
            }
            // line 41
            echo "      ";
            if (($context["all_icons_show"] ?? null)) {
                // line 42
                echo "        ";
                $this->loadTemplate("@mili/template-parts/social-icons.html.twig", "@mili/template-parts/footer.html.twig", 42)->display($context);
                // line 43
                echo "      ";
            }
            // line 44
            echo "    </section><!-- /footer-bottom-section -->
    ";
        }
        // line 46
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 46)) {
            // line 47
            echo "    <section class=\"footer-bottom\">
      ";
            // line 48
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom", [], "any", false, false, true, 48), 48, $this->source), "html", null, true);
            echo "
    </section> <!-- /footer-bottom -->
    ";
        }
        // line 51
        echo "  </div><!-- /.container -->
</footer>
";
        // line 53
        if (($context["scrolltotop_on"] ?? null)) {
            // line 54
            echo "<div class=\"scrolltop\"><i class=\"icon-angle-up\"></i></div>
";
        }
        // line 56
        echo "<!-- End: Footer -->
";
        // line 57
        if (($context["font_icon_fontawesome"] ?? null)) {
            // line 58
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mili/fontawesome"), "html", null, true);
            echo "
";
        }
        // line 60
        if (($context["font_icon_material"] ?? null)) {
            // line 61
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("mili/material"), "html", null, true);
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "@mili/template-parts/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 61,  182 => 60,  177 => 58,  175 => 57,  172 => 56,  168 => 54,  166 => 53,  162 => 51,  156 => 48,  153 => 47,  150 => 46,  146 => 44,  143 => 43,  140 => 42,  137 => 41,  129 => 38,  126 => 37,  124 => 36,  121 => 35,  118 => 34,  116 => 33,  111 => 31,  105 => 29,  102 => 28,  99 => 27,  93 => 24,  90 => 23,  87 => 22,  81 => 19,  78 => 18,  75 => 17,  69 => 14,  66 => 13,  64 => 12,  61 => 11,  59 => 10,  55 => 8,  49 => 6,  46 => 5,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@mili/template-parts/footer.html.twig", "C:\\xampp\\htdocs\\nse\\themes\\contrib\\mili\\templates\\template-parts\\footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 4, "include" => 42);
        static $filters = array("escape" => 6, "date" => 38);
        static $functions = array("attach_library" => 58);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
                ['escape', 'date'],
                ['attach_library']
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
