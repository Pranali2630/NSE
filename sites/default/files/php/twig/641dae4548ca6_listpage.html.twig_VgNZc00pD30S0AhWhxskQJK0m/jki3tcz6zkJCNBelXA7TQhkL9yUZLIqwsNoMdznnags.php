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

/* modules/custom/nse_csvimport/templates/listpage.html.twig */
class __TwigTemplate_f41600d91d114666367e7fe2ce1148c60f2e448111d55a7b5a15af055bbca84e extends \Twig\Template
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
        echo "
<div class=\"view-content\">
   <table class=\"views-table cols-4\" id=\"table\">
      <thead>
         <tr>
            <th id=\"view-name-table-column\" class=\"views-field views-field-name\" scope=\"col\">Date</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">Net Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">FII Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">DII Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Client Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Pro Diff</th>
         </tr>
      </thead>

      <tbody>
        ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 17
            echo "         <tr>
            <td class=\"views-field views-field-id\">";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 0, [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            echo "</td>
            
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 1, [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo " </td>
            ";
            // line 21
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], 2, [], "any", false, false, true, 21) <=  -1)) {
                // line 22
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 2, [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 23
$context["rec"], 2, [], "any", false, false, true, 23) >= 1)) {
                // line 24
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 2, [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 26
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 2, [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 28
            echo "

            ";
            // line 30
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], 3, [], "any", false, false, true, 30) <=  -1)) {
                // line 31
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 3, [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 32
$context["rec"], 3, [], "any", false, false, true, 32) >= 1)) {
                // line 33
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 3, [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 35
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 3, [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 36
            echo "  


            ";
            // line 39
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], 4, [], "any", false, false, true, 39) <=  -1)) {
                // line 40
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 4, [], "any", false, false, true, 40), 40, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 41
$context["rec"], 4, [], "any", false, false, true, 41) >= 1)) {
                // line 42
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 4, [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 44
                echo "              <td headers=\" view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 4, [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 45
            echo "   


           ";
            // line 48
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], 5, [], "any", false, false, true, 48) <=  -1)) {
                // line 49
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 5, [], "any", false, false, true, 49), 49, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 50
$context["rec"], 5, [], "any", false, false, true, 50) >= 1)) {
                // line 51
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 5, [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 53
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], 5, [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 54
            echo "  


          
         
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "      </tbody>
   </table>
</div>

";
    }

    public function getTemplateName()
    {
        return "modules/custom/nse_csvimport/templates/listpage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 61,  170 => 54,  164 => 53,  158 => 51,  156 => 50,  151 => 49,  149 => 48,  144 => 45,  138 => 44,  132 => 42,  130 => 41,  125 => 40,  123 => 39,  118 => 36,  112 => 35,  106 => 33,  104 => 32,  99 => 31,  97 => 30,  93 => 28,  87 => 26,  81 => 24,  79 => 23,  74 => 22,  72 => 21,  68 => 20,  63 => 18,  60 => 17,  56 => 16,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nse_csvimport/templates/listpage.html.twig", "C:\\xampp\\htdocs\\nse\\modules\\custom\\nse_csvimport\\templates\\listpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 16, "if" => 21);
        static $filters = array("escape" => 18);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
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
