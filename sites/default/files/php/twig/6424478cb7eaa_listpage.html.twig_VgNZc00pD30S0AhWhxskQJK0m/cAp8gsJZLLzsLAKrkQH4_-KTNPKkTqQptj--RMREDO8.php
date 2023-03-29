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
   <h3>Future Calculation</h3>
   <table class=\"views-table cols-4\" id=\"table\">
      <thead>
         <tr>
            <th id=\"view-name-table-column\" class=\"views-field views-field-name\" scope=\"col\">Date</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">Net Diff Long</th>
           <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">Net Diff Short</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">FII Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">DII Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Client Diff</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Pro Diff</th>
         </tr>
      </thead>

      <tbody>
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 19
            echo "         <tr>
            <td class=\"views-field views-field-id\">";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "</td>
            
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo " </td>
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo " </td>
            ";
            // line 24
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 24) <=  -1)) {
                // line 25
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 26
$context["rec"], "fiiDiff", [], "any", false, false, true, 26) >= 1)) {
                // line 27
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 27), 27, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 29
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 31
            echo "

            ";
            // line 33
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 33) <=  -1)) {
                // line 34
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 35
$context["rec"], "diiDiff", [], "any", false, false, true, 35) >= 1)) {
                // line 36
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 38
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 39
            echo "  


            ";
            // line 42
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 42) <=  -1)) {
                // line 43
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 43), 43, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 44
$context["rec"], "clientDiff", [], "any", false, false, true, 44) >= 1)) {
                // line 45
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 45), 45, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 47
                echo "              <td headers=\" view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 47), 47, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 48
            echo "   


           ";
            // line 51
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 51) <=  -1)) {
                // line 52
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 52), 52, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 53
$context["rec"], "proDiff", [], "any", false, false, true, 53) >= 1)) {
                // line 54
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 56
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 56), 56, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 57
            echo "  


          
         
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "      </tbody>
   </table>

   <h3>Option Calculation</h3>
   <table class=\"views-table cols-4\" id=\"option\">
      <thead>
         <tr>
            <th id=\"view-name-table-column\" class=\"views-field views-field-name\" scope=\"col\">Date</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">FII Call Long</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">FII Put Long</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">FII Call Short</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">FII Put Short</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Bullish</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Bearish</th>
         </tr>
      </thead>
      <tbody>
        ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 82
            echo "          <tr>
              <td class=\"views-field views-field-id\">";
            // line 83
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 84
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fii_call_long", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 85
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fii_put_long", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 86
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fii_call_short", [], "any", false, false, true, 86), 86, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 87
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fii_put_short", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bullish", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 89
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bearish", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
            echo "</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
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
        return array (  247 => 92,  238 => 89,  234 => 88,  230 => 87,  226 => 86,  222 => 85,  218 => 84,  214 => 83,  211 => 82,  207 => 81,  188 => 64,  176 => 57,  170 => 56,  164 => 54,  162 => 53,  157 => 52,  155 => 51,  150 => 48,  144 => 47,  138 => 45,  136 => 44,  131 => 43,  129 => 42,  124 => 39,  118 => 38,  112 => 36,  110 => 35,  105 => 34,  103 => 33,  99 => 31,  93 => 29,  87 => 27,  85 => 26,  80 => 25,  78 => 24,  74 => 23,  70 => 22,  65 => 20,  62 => 19,  58 => 18,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nse_csvimport/templates/listpage.html.twig", "C:\\xampp\\htdocs\\nse\\modules\\custom\\nse_csvimport\\templates\\listpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 18, "if" => 24);
        static $filters = array("escape" => 20);
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
