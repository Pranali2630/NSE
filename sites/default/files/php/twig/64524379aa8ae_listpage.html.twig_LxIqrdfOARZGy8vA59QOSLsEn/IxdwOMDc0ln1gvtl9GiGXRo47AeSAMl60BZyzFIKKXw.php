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
class __TwigTemplate_b5c66552c6e8a7ea194e9074f1af99ed7cf307ca7977c8882435f0eeb95fed3f extends \Twig\Template
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
        echo "<head>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

 <div class=\"view-content\">
 ";
        // line 6
        $context["date"] = [];
        // line 7
        echo " ";
        $context["netdiff"] = [];
        // line 8
        echo " ";
        $context["shortnetdiff"] = [];
        // line 9
        echo " ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 10
            echo "    ";
            $context["date"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["date"] ?? null), 10, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 10)]);
            echo "  
    ";
            // line 11
            $context["netdiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["netdiff"] ?? null), 11, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 11)]);
            echo " 
    ";
            // line 12
            $context["shortnetdiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["shortnetdiff"] ?? null), 12, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 12)]);
            echo "  
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "

   ";
        // line 16
        $context["title"] = "The Chart Title";
        // line 17
        echo "
    ";
        // line 19
        $context["series"] = ["my_series" => ["title" => "Long Net Difference plotted", "data" =>         // line 22
($context["netdiff"] ?? null)], "my_series1" => ["title" => "Short Net Difference plotted", "data" =>         // line 26
($context["shortnetdiff"] ?? null)]];
        // line 30
        echo "   
    ";
        // line 32
        $context["xaxis"] = ["title" => "X-Axis Label", "labels" =>         // line 34
($context["date"] ?? null)];
        // line 37
        echo "    
    ";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\charts_twig\ChartsTwig']->createChart("my_twig_chart", "line", $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 38, $this->source), $this->sandbox->ensureToStringAllowed(($context["series"] ?? null), 38, $this->source), $this->sandbox->ensureToStringAllowed(($context["xaxis"] ?? null), 38, $this->source), [], []), "html", null, true);
        echo "
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
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 55
            echo "         <tr>
            <td class=\"views-field views-field-id date-field\">";
            // line 56
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 56), 56, $this->source), "html", null, true);
            echo "</td>
            
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 58
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 58), 58, $this->source), "html", null, true);
            echo " </td>
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo " </td>
            ";
            // line 60
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 60) <=  -1)) {
                // line 61
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 62
$context["rec"], "fiiDiff", [], "any", false, false, true, 62) >= 1)) {
                // line 63
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 63), 63, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 65
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 67
            echo "

            ";
            // line 69
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 69) <=  -1)) {
                // line 70
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 70), 70, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 71
$context["rec"], "diiDiff", [], "any", false, false, true, 71) >= 1)) {
                // line 72
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 74
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 75
            echo "  


            ";
            // line 78
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 78) <=  -1)) {
                // line 79
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 79), 79, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 80
$context["rec"], "clientDiff", [], "any", false, false, true, 80) >= 1)) {
                // line 81
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 81), 81, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 83
                echo "              <td headers=\" view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 83), 83, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 84
            echo "   


           ";
            // line 87
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 87) <=  -1)) {
                // line 88
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 88), 88, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 89
$context["rec"], "proDiff", [], "any", false, false, true, 89) >= 1)) {
                // line 90
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 92
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 92), 92, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 93
            echo "  


          
         
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
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
        // line 117
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 118
            echo "          <tr>
              <td class=\"views-field views-field-id date-field\">";
            // line 119
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 119), 119, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 120
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bullish", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 121
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bearish", [], "any", false, false, true, 121), 121, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 122
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbullish", [], "any", false, false, true, 122), 122, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 123
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbearish", [], "any", false, false, true, 123), 123, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 124
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probullish", [], "any", false, false, true, 124), 124, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 125
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probearish", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
            echo "</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "      </tbody>
    </table>

    <a href=\"/nse/export\" class=\"views-display-link views-display-link-data_export_1  date-field download\">
    Download <i class=\"fa fa-download fa-2x\"></i></a>
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
        return array (  306 => 128,  297 => 125,  293 => 124,  289 => 123,  285 => 122,  281 => 121,  277 => 120,  273 => 119,  270 => 118,  266 => 117,  247 => 100,  235 => 93,  229 => 92,  223 => 90,  221 => 89,  216 => 88,  214 => 87,  209 => 84,  203 => 83,  197 => 81,  195 => 80,  190 => 79,  188 => 78,  183 => 75,  177 => 74,  171 => 72,  169 => 71,  164 => 70,  162 => 69,  158 => 67,  152 => 65,  146 => 63,  144 => 62,  139 => 61,  137 => 60,  133 => 59,  129 => 58,  124 => 56,  121 => 55,  117 => 54,  98 => 38,  95 => 37,  93 => 34,  92 => 32,  89 => 30,  87 => 26,  86 => 22,  85 => 19,  82 => 17,  80 => 16,  76 => 14,  68 => 12,  64 => 11,  59 => 10,  54 => 9,  51 => 8,  48 => 7,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nse_csvimport/templates/listpage.html.twig", "C:\\xampp\\htdocs\\nse\\modules\\custom\\nse_csvimport\\templates\\listpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 6, "for" => 9, "if" => 60);
        static $filters = array("merge" => 10, "escape" => 38);
        static $functions = array("chart" => 38);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['merge', 'escape'],
                ['chart']
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
