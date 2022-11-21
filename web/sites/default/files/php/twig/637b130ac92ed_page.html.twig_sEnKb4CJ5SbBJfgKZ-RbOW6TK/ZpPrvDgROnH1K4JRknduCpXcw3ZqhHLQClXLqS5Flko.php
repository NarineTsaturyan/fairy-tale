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

/* themes/custom/fairy_tale/templates/page.html.twig */
class __TwigTemplate_c8727b48d079aadbcea435f19f57468d extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'navbar' => [$this, 'block_navbar'],
            'banner' => [$this, 'block_banner'],
            'main' => [$this, 'block_main'],
            'header' => [$this, 'block_header'],
            'sidebar_first' => [$this, 'block_sidebar_first'],
            'highlighted' => [$this, 'block_highlighted'],
            'help' => [$this, 'block_help'],
            'content' => [$this, 'block_content'],
            'sidebar_second' => [$this, 'block_sidebar_second'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 54
        $context["container"] = ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 54), "fluid_container", [], "any", false, false, true, 54)) ? ("container-fluid") : ("container"));
        // line 55
        echo "
";
        // line 57
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 57) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 57))) {
            // line 58
            echo "  ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 97
        echo "

";
        // line 99
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 99)) {
            // line 100
            echo "  ";
            $this->displayBlock('banner', $context, $blocks);
        }
        // line 104
        echo "


";
        // line 108
        $this->displayBlock('main', $context, $blocks);
        // line 173
        echo "
";
        // line 174
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 174)) {
            // line 175
            echo "  ";
            $this->displayBlock('footer', $context, $blocks);
        }
    }

    // line 58
    public function block_navbar($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 59
        echo "    ";
        // line 60
        $context["navbar_classes"] = [0 => "navbar", 1 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 62
($context["theme"] ?? null), "settings", [], "any", false, false, true, 62), "navbar_inverse", [], "any", false, false, true, 62)) ? ("navbar-inverse") : ("navbar-default")), 2 => ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 63
($context["theme"] ?? null), "settings", [], "any", false, false, true, 63), "navbar_position", [], "any", false, false, true, 63)) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["theme"] ?? null), "settings", [], "any", false, false, true, 63), "navbar_position", [], "any", false, false, true, 63), 63, $this->source)))) : ("container-fluid"))];
        // line 66
        echo "    <header";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "addClass", [0 => ($context["navbar_classes"] ?? null)], "method", false, false, true, 66), 66, $this->source), "html", null, true);
        echo " id=\"navbar\" role=\"banner\">
      ";
        // line 67
        if ( !twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method", false, false, true, 67)) {
            // line 68
            echo "        <div class=\"container-fluid\">
        <div class=\"container\">
      ";
        }
        // line 71
        echo "      <div class=\"navbar-header\">
        ";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation", [], "any", false, false, true, 72), 72, $this->source), "html", null, true);
        echo "
        ";
        // line 74
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 74)) {
            // line 75
            echo "          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\" aria-expanded=\"false\">
            <span class=\"sr-only\">";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Toggle navigation"));
            echo "</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
        ";
        }
        // line 82
        echo "      </div>

      ";
        // line 85
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 85)) {
            // line 86
            echo "        <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
          ";
            // line 87
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navigation_collapsible", [], "any", false, false, true, 87), 87, $this->source), "html", null, true);
            echo "
        </div>
      ";
        }
        // line 90
        echo "      ";
        if ( !twig_get_attribute($this->env, $this->source, ($context["navbar_attributes"] ?? null), "hasClass", [0 => ($context["container"] ?? null)], "method", false, false, true, 90)) {
            // line 91
            echo "        </div>
        </div>
      ";
        }
        // line 94
        echo "    </header>
  ";
    }

    // line 100
    public function block_banner($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 101
        echo "      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "banner", [], "any", false, false, true, 101), 101, $this->source), "html", null, true);
        echo "
  ";
    }

    // line 108
    public function block_main($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "  <div role=\"main\" class=\"main-container ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null), 109, $this->source), "html", null, true);
        echo " js-quickedit-main-content\">
    <div class=\"row\">

      ";
        // line 113
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 113)) {
            // line 114
            echo "        ";
            $this->displayBlock('header', $context, $blocks);
            // line 119
            echo "      ";
        }
        // line 120
        echo "
      ";
        // line 122
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 122)) {
            // line 123
            echo "        ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 128
            echo "      ";
        }
        // line 129
        echo "
      ";
        // line 131
        echo "      ";
        // line 132
        $context["content_classes"] = [0 => (((twig_get_attribute($this->env, $this->source,         // line 133
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 133) && twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 133))) ? ("col-sm-6") : ("")), 1 => (((twig_get_attribute($this->env, $this->source,         // line 134
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 134) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 134)))) ? ("col-sm-9") : ("")), 2 => (((twig_get_attribute($this->env, $this->source,         // line 135
($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 135) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 135)))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty(twig_get_attribute($this->env, $this->source,         // line 136
($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 136)) && twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 136)))) ? ("col-sm-12") : (""))];
        // line 139
        echo "      <section";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [0 => ($context["content_classes"] ?? null)], "method", false, false, true, 139), 139, $this->source), "html", null, true);
        echo ">

        ";
        // line 142
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 142)) {
            // line 143
            echo "          ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 146
            echo "        ";
        }
        // line 147
        echo "
        ";
        // line 149
        echo "        ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 149)) {
            // line 150
            echo "          ";
            $this->displayBlock('help', $context, $blocks);
            // line 153
            echo "        ";
        }
        // line 154
        echo "
        ";
        // line 156
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 160
        echo "      </section>

      ";
        // line 163
        echo "      ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 163)) {
            // line 164
            echo "        ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 169
            echo "      ";
        }
        // line 170
        echo "    </div>
  </div>
";
    }

    // line 114
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 115
        echo "          <div class=\"col-sm-12\" role=\"heading\">
            ";
        // line 116
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 116), 116, $this->source), "html", null, true);
        echo "
          </div>
        ";
    }

    // line 123
    public function block_sidebar_first($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 124
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 125
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 125), 125, $this->source), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 143
    public function block_highlighted($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 144
        echo "            <div class=\"highlighted\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "highlighted", [], "any", false, false, true, 144), 144, $this->source), "html", null, true);
        echo "</div>
          ";
    }

    // line 150
    public function block_help($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 151
        echo "            ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "help", [], "any", false, false, true, 151), 151, $this->source), "html", null, true);
        echo "
          ";
    }

    // line 156
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 157
        echo "          <a id=\"main-content\"></a>
          ";
        // line 158
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 158), 158, $this->source), "html", null, true);
        echo "
        ";
    }

    // line 164
    public function block_sidebar_second($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 165
        echo "          <aside class=\"col-sm-3\" role=\"complementary\">
            ";
        // line 166
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 166), 166, $this->source), "html", null, true);
        echo "
          </aside>
        ";
    }

    // line 175
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 176
        echo "    <footer class=\"footer container-fluid\" role=\"contentinfo\">
    <div class='container'>
      ";
        // line 178
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 178), 178, $this->source), "html", null, true);
        echo "
    </div>
    </footer>
    <footer class=\"footer-second container-fluid\" role=\"contentinfo\">
    <div class='container'>
      ";
        // line 183
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 183), 183, $this->source), "html", null, true);
        echo "
    </div>
    </footer>
  ";
    }

    public function getTemplateName()
    {
        return "themes/custom/fairy_tale/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  360 => 183,  352 => 178,  348 => 176,  344 => 175,  337 => 166,  334 => 165,  330 => 164,  324 => 158,  321 => 157,  317 => 156,  310 => 151,  306 => 150,  299 => 144,  295 => 143,  288 => 125,  285 => 124,  281 => 123,  274 => 116,  271 => 115,  267 => 114,  261 => 170,  258 => 169,  255 => 164,  252 => 163,  248 => 160,  245 => 156,  242 => 154,  239 => 153,  236 => 150,  233 => 149,  230 => 147,  227 => 146,  224 => 143,  221 => 142,  215 => 139,  213 => 136,  212 => 135,  211 => 134,  210 => 133,  209 => 132,  207 => 131,  204 => 129,  201 => 128,  198 => 123,  195 => 122,  192 => 120,  189 => 119,  186 => 114,  183 => 113,  176 => 109,  172 => 108,  165 => 101,  161 => 100,  156 => 94,  151 => 91,  148 => 90,  142 => 87,  139 => 86,  136 => 85,  132 => 82,  123 => 76,  120 => 75,  117 => 74,  113 => 72,  110 => 71,  105 => 68,  103 => 67,  98 => 66,  96 => 63,  95 => 62,  94 => 60,  92 => 59,  88 => 58,  82 => 175,  80 => 174,  77 => 173,  75 => 108,  70 => 104,  66 => 100,  64 => 99,  60 => 97,  56 => 58,  54 => 57,  51 => 55,  49 => 54,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/fairy_tale/templates/page.html.twig", "/home/laptop/projects/tales/web/themes/custom/fairy_tale/templates/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 54, "if" => 57, "block" => 58);
        static $filters = array("clean_class" => 63, "escape" => 66, "t" => 76);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape', 't'],
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
