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
        $context["fiidiff"] = [];
        // line 10
        echo " ";
        $context["diidiff"] = [];
        // line 11
        echo " ";
        $context["clientdiff"] = [];
        // line 12
        echo " ";
        $context["prodiff"] = [];
        // line 13
        echo " ";
        $context["fiibullish"] = [];
        // line 14
        echo " ";
        $context["fiibearish"] = [];
        // line 15
        echo " ";
        $context["clientbullish"] = [];
        // line 16
        echo " ";
        $context["clientbearish"] = [];
        // line 17
        echo " ";
        $context["probullish"] = [];
        // line 18
        echo " ";
        $context["probearish"] = [];
        // line 19
        echo " 
 ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 21
            echo "    ";
            $context["date"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["date"] ?? null), 21, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 21)]);
            echo "  
    ";
            // line 22
            $context["netdiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["netdiff"] ?? null), 22, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 22)]);
            echo " 
    ";
            // line 23
            $context["shortnetdiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["shortnetdiff"] ?? null), 23, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 23)]);
            echo " 
    ";
            // line 24
            $context["fiidiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["fiidiff"] ?? null), 24, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 24)]);
            // line 25
            echo "    ";
            $context["diidiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 25, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 25)]);
            echo " 
    ";
            // line 26
            $context["clientdiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["clientdiff"] ?? null), 26, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 26)]);
            echo " 
    ";
            // line 27
            $context["prodiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["prodiff"] ?? null), 27, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 27)]);
            echo " 
    ";
            // line 28
            $context["fiibullish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["fiibullish"] ?? null), 28, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "fiiBullish", [], "any", false, false, true, 28)]);
            echo " 
    ";
            // line 29
            $context["fiibearish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["fiibearish"] ?? null), 29, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "fiiBearish", [], "any", false, false, true, 29)]);
            // line 30
            echo "    ";
            $context["clientbullish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["clientbullish"] ?? null), 30, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "clientBullish", [], "any", false, false, true, 30)]);
            echo " 
    ";
            // line 31
            $context["clientbearish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["clientbearish"] ?? null), 31, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "clientBearish", [], "any", false, false, true, 31)]);
            echo " 
    ";
            // line 32
            $context["probullish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["probullish"] ?? null), 32, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "proBullish", [], "any", false, false, true, 32)]);
            echo " 
    ";
            // line 33
            $context["probearish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["probearish"] ?? null), 33, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "proBearish", [], "any", false, false, true, 33)]);
            echo " 
  
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo " 

   ";
        // line 38
        $context["title"] = "Future Calculation Chart";
        // line 39
        echo "
    ";
        // line 41
        $context["series"] = ["fii_diff" => ["title" => "FII Difference plotted", "data" =>         // line 44
($context["fiidiff"] ?? null)], "dii_diff" => ["title" => "DII Difference plotted", "data" =>         // line 48
($context["diidiff"] ?? null)], "client_diff" => ["title" => "Client Difference plotted", "data" =>         // line 52
($context["clientdiff"] ?? null)], "pro_diff" => ["title" => "Pro Difference plotted", "data" =>         // line 56
($context["prodiff"] ?? null)]];
        // line 61
        echo "   
    ";
        // line 63
        $context["xaxis"] = ["title" => "X-Axis Label", "labels" =>         // line 65
($context["date"] ?? null)];
        // line 68
        echo "    
    ";
        // line 69
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\charts_twig\ChartsTwig']->createChart("my_twig_chart", "line", $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 69, $this->source), $this->sandbox->ensureToStringAllowed(($context["series"] ?? null), 69, $this->source), $this->sandbox->ensureToStringAllowed(($context["xaxis"] ?? null), 69, $this->source), [], []), "html", null, true);
        echo "


     ";
        // line 72
        $context["title"] = "Optinal Calculation Chart";
        // line 73
        echo "
    ";
        // line 75
        $context["series"] = ["fii_bullish" => ["title" => "FII Bullish plotted", "data" =>         // line 78
($context["fiibullish"] ?? null)], "fii_bearish" => ["title" => "FII Bearish plotted", "data" =>         // line 82
($context["fiibearish"] ?? null)], "client_bullish" => ["title" => "Client Bullish plotted", "data" =>         // line 86
($context["clientbullish"] ?? null)], "client_bearish" => ["title" => "Client Bearish plotted", "data" =>         // line 90
($context["clientbearish"] ?? null)], "pro_bullish" => ["title" => "Pro Bullish plotted", "data" =>         // line 94
($context["probullish"] ?? null)], "pro_bearish" => ["title" => "Pro Bearish plotted", "data" =>         // line 98
($context["probearish"] ?? null)]];
        // line 102
        echo "   
    ";
        // line 104
        $context["xaxis"] = ["title" => "X-Axis Label", "labels" =>         // line 106
($context["date"] ?? null)];
        // line 109
        echo "    
    ";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\charts_twig\ChartsTwig']->createChart("my_twig_chart", "line", $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 110, $this->source), $this->sandbox->ensureToStringAllowed(($context["series"] ?? null), 110, $this->source), $this->sandbox->ensureToStringAllowed(($context["xaxis"] ?? null), 110, $this->source), [], []), "html", null, true);
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
        // line 126
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 127
            echo "         <tr>
            <td class=\"views-field views-field-id date-field\">";
            // line 128
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 128), 128, $this->source), "html", null, true);
            echo "</td>
            
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 130
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 130), 130, $this->source), "html", null, true);
            echo " </td>
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 131
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 131), 131, $this->source), "html", null, true);
            echo " </td>
            ";
            // line 132
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 132) <=  -1)) {
                // line 133
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 133), 133, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 134
$context["rec"], "fiiDiff", [], "any", false, false, true, 134) >= 1)) {
                // line 135
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 135), 135, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 137
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 137), 137, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 139
            echo "

            ";
            // line 141
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 141) <=  -1)) {
                // line 142
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 142), 142, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 143
$context["rec"], "diiDiff", [], "any", false, false, true, 143) >= 1)) {
                // line 144
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 144), 144, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 146
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 146), 146, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 147
            echo "  


            ";
            // line 150
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 150) <=  -1)) {
                // line 151
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 151), 151, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 152
$context["rec"], "clientDiff", [], "any", false, false, true, 152) >= 1)) {
                // line 153
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 153), 153, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 155
                echo "              <td headers=\" view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 155), 155, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 156
            echo "   


           ";
            // line 159
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 159) <=  -1)) {
                // line 160
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 160), 160, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 161
$context["rec"], "proDiff", [], "any", false, false, true, 161) >= 1)) {
                // line 162
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 162), 162, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 164
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 164), 164, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 165
            echo "  


          
         
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 172
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
        // line 189
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 190
            echo "          <tr>
              <td class=\"views-field views-field-id date-field\">";
            // line 191
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 191), 191, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 192
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bullish", [], "any", false, false, true, 192), 192, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 193
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bearish", [], "any", false, false, true, 193), 193, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 194
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbullish", [], "any", false, false, true, 194), 194, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 195
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbearish", [], "any", false, false, true, 195), 195, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 196
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probullish", [], "any", false, false, true, 196), 196, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 197
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probearish", [], "any", false, false, true, 197), 197, $this->source), "html", null, true);
            echo "</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
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
        return array (  407 => 200,  398 => 197,  394 => 196,  390 => 195,  386 => 194,  382 => 193,  378 => 192,  374 => 191,  371 => 190,  367 => 189,  348 => 172,  336 => 165,  330 => 164,  324 => 162,  322 => 161,  317 => 160,  315 => 159,  310 => 156,  304 => 155,  298 => 153,  296 => 152,  291 => 151,  289 => 150,  284 => 147,  278 => 146,  272 => 144,  270 => 143,  265 => 142,  263 => 141,  259 => 139,  253 => 137,  247 => 135,  245 => 134,  240 => 133,  238 => 132,  234 => 131,  230 => 130,  225 => 128,  222 => 127,  218 => 126,  199 => 110,  196 => 109,  194 => 106,  193 => 104,  190 => 102,  188 => 98,  187 => 94,  186 => 90,  185 => 86,  184 => 82,  183 => 78,  182 => 75,  179 => 73,  177 => 72,  171 => 69,  168 => 68,  166 => 65,  165 => 63,  162 => 61,  160 => 56,  159 => 52,  158 => 48,  157 => 44,  156 => 41,  153 => 39,  151 => 38,  147 => 36,  138 => 33,  134 => 32,  130 => 31,  125 => 30,  123 => 29,  119 => 28,  115 => 27,  111 => 26,  106 => 25,  104 => 24,  100 => 23,  96 => 22,  91 => 21,  87 => 20,  84 => 19,  81 => 18,  78 => 17,  75 => 16,  72 => 15,  69 => 14,  66 => 13,  63 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nse_csvimport/templates/listpage.html.twig", "C:\\xampp\\htdocs\\nse\\modules\\custom\\nse_csvimport\\templates\\listpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 6, "for" => 20, "if" => 132);
        static $filters = array("merge" => 21, "escape" => 69);
        static $functions = array("chart" => 69);

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
