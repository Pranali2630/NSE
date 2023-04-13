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
        echo "<div class=\"view-content\">
   <h2>Future Calculation</h2>
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
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 18
            echo "         <tr>
            <td class=\"views-field views-field-id date-field\">";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "</td>
            
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
            echo " </td>
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
            echo " </td>
            ";
            // line 23
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 23) <=  -1)) {
                // line 24
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 25
$context["rec"], "fiiDiff", [], "any", false, false, true, 25) >= 1)) {
                // line 26
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 28
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 30
            echo "

            ";
            // line 32
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 32) <=  -1)) {
                // line 33
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 34
$context["rec"], "diiDiff", [], "any", false, false, true, 34) >= 1)) {
                // line 35
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 37
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 38
            echo "  


            ";
            // line 41
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 41) <=  -1)) {
                // line 42
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 42), 42, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 43
$context["rec"], "clientDiff", [], "any", false, false, true, 43) >= 1)) {
                // line 44
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 44), 44, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 46
                echo "              <td headers=\" view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 46), 46, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 47
            echo "   


           ";
            // line 50
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 50) <=  -1)) {
                // line 51
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 52
$context["rec"], "proDiff", [], "any", false, false, true, 52) >= 1)) {
                // line 53
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 53), 53, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 55
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 56
            echo "  


          
         
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "      </tbody>
   </table>

   <h2>Option Calculation</h2>
   <table class=\"views-table cols-4\" id=\"option\">
      <thead>
         <tr>
            <th id=\"view-name-table-column\" class=\"views-field views-field-name\" scope=\"col\">Date</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">FII Bullish</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">FII Bearish</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">Client Bullish</th>
            <th id=\"view-email-table-column\" class=\"views-field views-field-email\" scope=\"col\">Client Bearish</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Pro Bullish</th>
            <th id=\"view-mobile-table-column\" class=\"views-field views-field-mobile\" scope=\"col\">Pro Bearish</th>
         </tr>
      </thead>
      <tbody>
        ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 81
            echo "          <tr>
              <td class=\"views-field views-field-id date-field\">";
            // line 82
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 82), 82, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 83
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bullish", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 84
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bearish", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 85
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbullish", [], "any", false, false, true, 85), 85, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 86
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbearish", [], "any", false, false, true, 86), 86, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 87
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probullish", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 88
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probearish", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
            echo "</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 91
        echo "      </tbody>
    </table>
</div>";
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
        return array (  246 => 91,  237 => 88,  233 => 87,  229 => 86,  225 => 85,  221 => 84,  217 => 83,  213 => 82,  210 => 81,  206 => 80,  187 => 63,  175 => 56,  169 => 55,  163 => 53,  161 => 52,  156 => 51,  154 => 50,  149 => 47,  143 => 46,  137 => 44,  135 => 43,  130 => 42,  128 => 41,  123 => 38,  117 => 37,  111 => 35,  109 => 34,  104 => 33,  102 => 32,  98 => 30,  92 => 28,  86 => 26,  84 => 25,  79 => 24,  77 => 23,  73 => 22,  69 => 21,  64 => 19,  61 => 18,  57 => 17,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nse_csvimport/templates/listpage.html.twig", "C:\\xampp\\htdocs\\nse\\modules\\custom\\nse_csvimport\\templates\\listpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 17, "if" => 23);
        static $filters = array("escape" => 19);
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
