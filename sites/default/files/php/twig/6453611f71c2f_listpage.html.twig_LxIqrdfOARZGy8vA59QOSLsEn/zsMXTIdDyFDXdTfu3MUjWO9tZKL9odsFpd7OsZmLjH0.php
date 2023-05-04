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
            $context["clientdiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 26, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 26)]);
            echo " 
    ";
            // line 27
            $context["prodiff"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 27, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 27)]);
            echo " 
    ";
            // line 28
            $context["fiibullish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 28, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "bullish", [], "any", false, false, true, 28)]);
            echo " 
    ";
            // line 29
            $context["fiibearish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 29, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "bearish", [], "any", false, false, true, 29)]);
            // line 30
            echo "    ";
            $context["clientbullish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 30, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "clientbullish", [], "any", false, false, true, 30)]);
            echo " 
    ";
            // line 31
            $context["clientbearish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 31, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "clientbearish", [], "any", false, false, true, 31)]);
            echo " 
    ";
            // line 32
            $context["probullish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 32, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "probullish", [], "any", false, false, true, 32)]);
            echo " 
    ";
            // line 33
            $context["probearish"] = twig_array_merge($this->sandbox->ensureToStringAllowed(($context["diidiff"] ?? null), 33, $this->source), [0 => twig_get_attribute($this->env, $this->source, $context["rec"], "probearish", [], "any", false, false, true, 33)]);
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
        $context["title"] = "Future and Optinal Calculation Chart";
        // line 39
        echo "
    ";
        // line 41
        $context["series"] = ["long_diff" => ["title" => "Long Net Difference plotted", "data" =>         // line 44
($context["netdiff"] ?? null)], "short_diff" => ["title" => "Short Net Difference plotted", "data" =>         // line 48
($context["shortnetdiff"] ?? null)], "fii_diff" => ["title" => "FII Difference plotted", "data" =>         // line 52
($context["fiidiff"] ?? null)], "dii_diff" => ["title" => "DII Difference plotted", "data" =>         // line 56
($context["diidiff"] ?? null)], "client_diff" => ["title" => "Client Difference plotted", "data" =>         // line 60
($context["clientdiff"] ?? null)], "pro_diff" => ["title" => "Pro Difference plotted", "data" =>         // line 64
($context["prodiff"] ?? null)], "fii_bullish" => ["title" => "FII Bullish plotted", "data" =>         // line 68
($context["fiibullish"] ?? null)], "fii_bearish" => ["title" => "FII Bearish plotted", "data" =>         // line 72
($context["fiibearish"] ?? null)], "client_bullish" => ["title" => "Client Bullish plotted", "data" =>         // line 76
($context["clientbullish"] ?? null)], "client_bearish" => ["title" => "Client Bearish plotted", "data" =>         // line 80
($context["clientbearish"] ?? null)], "pro_bullish" => ["title" => "Pro Bullish plotted", "data" =>         // line 84
($context["probullish"] ?? null)], "pro_bearish" => ["title" => "Pro Bearish plotted", "data" =>         // line 88
($context["probearish"] ?? null)]];
        // line 92
        echo "   
    ";
        // line 94
        $context["xaxis"] = ["title" => "X-Axis Label", "labels" =>         // line 96
($context["date"] ?? null)];
        // line 99
        echo "    
    ";
        // line 100
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\charts_twig\ChartsTwig']->createChart("my_twig_chart", "line", $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 100, $this->source), $this->sandbox->ensureToStringAllowed(($context["series"] ?? null), 100, $this->source), $this->sandbox->ensureToStringAllowed(($context["xaxis"] ?? null), 100, $this->source), [], []), "html", null, true);
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
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 117
            echo "         <tr>
            <td class=\"views-field views-field-id date-field\">";
            // line 118
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 118), 118, $this->source), "html", null, true);
            echo "</td>
            
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 120
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiff", [], "any", false, false, true, 120), 120, $this->source), "html", null, true);
            echo " </td>
            <td headers=\"view-name-table-column\" class=\"views-field views-field-name\">";
            // line 121
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "netdiffshort", [], "any", false, false, true, 121), 121, $this->source), "html", null, true);
            echo " </td>
            ";
            // line 122
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 122) <=  -1)) {
                // line 123
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 123), 123, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 124
$context["rec"], "fiiDiff", [], "any", false, false, true, 124) >= 1)) {
                // line 125
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 127
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "fiiDiff", [], "any", false, false, true, 127), 127, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 129
            echo "

            ";
            // line 131
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 131) <=  -1)) {
                // line 132
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 132), 132, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 133
$context["rec"], "diiDiff", [], "any", false, false, true, 133) >= 1)) {
                // line 134
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 134), 134, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 136
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "diiDiff", [], "any", false, false, true, 136), 136, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 137
            echo "  


            ";
            // line 140
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 140) <=  -1)) {
                // line 141
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 141), 141, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 142
$context["rec"], "clientDiff", [], "any", false, false, true, 142) >= 1)) {
                // line 143
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 143), 143, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 145
                echo "              <td headers=\" view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientDiff", [], "any", false, false, true, 145), 145, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 146
            echo "   


           ";
            // line 149
            if ((twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 149) <=  -1)) {
                // line 150
                echo "            <td headers=\"view-email-table-column\" class=\"red views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 150), 150, $this->source), "html", null, true);
                echo "          </td>
            ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 151
$context["rec"], "proDiff", [], "any", false, false, true, 151) >= 1)) {
                // line 152
                echo "            <td headers=\"view-email-table-column\" class=\"green views-field views-field-email\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
                echo "          </td>
            ";
            } else {
                // line 154
                echo "              <td headers=\"view-email-table-column\" class=\"yellow views-field views-field-email\"> ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "proDiff", [], "any", false, false, true, 154), 154, $this->source), "html", null, true);
                echo "          </td>
            ";
            }
            // line 155
            echo "  


          
         
         </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
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
        // line 179
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rec"]) {
            // line 180
            echo "          <tr>
              <td class=\"views-field views-field-id date-field\">";
            // line 181
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "date", [], "any", false, false, true, 181), 181, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 182
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bullish", [], "any", false, false, true, 182), 182, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 183
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "bearish", [], "any", false, false, true, 183), 183, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 184
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbullish", [], "any", false, false, true, 184), 184, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 185
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "clientbearish", [], "any", false, false, true, 185), 185, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 186
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probullish", [], "any", false, false, true, 186), 186, $this->source), "html", null, true);
            echo "</td>
              <td class=\"views-field views-field-id\">";
            // line 187
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["rec"], "probearish", [], "any", false, false, true, 187), 187, $this->source), "html", null, true);
            echo "</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rec'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 190
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
        return array (  387 => 190,  378 => 187,  374 => 186,  370 => 185,  366 => 184,  362 => 183,  358 => 182,  354 => 181,  351 => 180,  347 => 179,  328 => 162,  316 => 155,  310 => 154,  304 => 152,  302 => 151,  297 => 150,  295 => 149,  290 => 146,  284 => 145,  278 => 143,  276 => 142,  271 => 141,  269 => 140,  264 => 137,  258 => 136,  252 => 134,  250 => 133,  245 => 132,  243 => 131,  239 => 129,  233 => 127,  227 => 125,  225 => 124,  220 => 123,  218 => 122,  214 => 121,  210 => 120,  205 => 118,  202 => 117,  198 => 116,  179 => 100,  176 => 99,  174 => 96,  173 => 94,  170 => 92,  168 => 88,  167 => 84,  166 => 80,  165 => 76,  164 => 72,  163 => 68,  162 => 64,  161 => 60,  160 => 56,  159 => 52,  158 => 48,  157 => 44,  156 => 41,  153 => 39,  151 => 38,  147 => 36,  138 => 33,  134 => 32,  130 => 31,  125 => 30,  123 => 29,  119 => 28,  115 => 27,  111 => 26,  106 => 25,  104 => 24,  100 => 23,  96 => 22,  91 => 21,  87 => 20,  84 => 19,  81 => 18,  78 => 17,  75 => 16,  72 => 15,  69 => 14,  66 => 13,  63 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  48 => 7,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/nse_csvimport/templates/listpage.html.twig", "C:\\xampp\\htdocs\\nse\\modules\\custom\\nse_csvimport\\templates\\listpage.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 6, "for" => 20, "if" => 122);
        static $filters = array("merge" => 21, "escape" => 100);
        static $functions = array("chart" => 100);

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
