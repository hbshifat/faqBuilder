<?php namespace WPPricing\Classes;

class TableRenderer
{
    private $config;
    private $tableId;
    private $blockSerials;
    private $hasFeaturedColumn = false;

    public function __construct($config, $tableID)
    {
        $this->config = $config;
        $this->tableId = $tableID;
        $this->setSerials();
    }

    private function setSerials()
    {
        $components = $this->config['component_settings'];
        $elementConfig = $this->config['element_config'];
        $formatted = array('ribbon');
        foreach ($components as $component) {
            $component_key = $component['key'];
            if ( ! isset($elementConfig[$component_key]['hide_section'])
                 || $elementConfig[$component_key]['hide_section'] != 'yes'
            ) {
                $formatted[] = $component_key;
            }
        }
        $this->blockSerials = $formatted;
    }

    public function render()
    {
        wp_enqueue_style('wp_pricing_table_css');

        $plans = $this->config['plans'];
        if ( ! $plans) {
            return;
        }

        $primaryColor = $this->config['globalStyles']['primary_color'];
        wp_add_inline_style('wp_pricing_table_css', $this->getAllGeneratedCSS($primaryColor, $plans));

        return $this->getTableHTML();
    }

    public function getTableHTML()
    {
        $willCacheContent = apply_filters('wp_pricing_cache_table_content_status', true, $this->tableId);
        if ($willCacheContent && $cachedContent = get_post_meta($this->tableId, '_wp_pricing_table_html', true)) {
            return $cachedContent;
        }

        $plans = $this->config['plans'];
        ob_start();
        $planHTML = '';
        foreach ($plans as $planIndex => $plan) {
            $planHTML .= $this->getPlanHTML($plan, $planIndex);
        }
        do_action('wp_pricing_before_table_render', $this->tableId, $this->config);
        ?>
        <div class="wp_pricing_wrapper wp_priceing_frontend <?php echo $this->getTableWrapperClasses(); ?>"
             id="wpp_table_<?php echo $this->tableId; ?>">
            <div class="wp_pricing_table-inner">
                <?php echo $planHTML; ?>
            </div>
        </div>
        <?php
        do_action('wp_pricing_after_table_render', $this->tableId, $this->config);
        $content = ob_get_clean();
        if ($willCacheContent) {
            update_post_meta($this->tableId, '_wp_pricing_table_html', $content);
        }
        
        return $content;
    }

    private function getTableWrapperClasses()
    {
        $plansCount = count($this->config['plans']);
        $plansCss = 'wp_pricing_plans_'.$plansCount;
        $typeCss = 'wp_pricing_'.$this->config['globalStyles']['layout'];
        $skinCss = 'ninja_pricing_.'.$this->config['globalStyles']['skin_id'];
        $borderCss = 'ninja_pricing_border_'.$this->config['globalStyles']['column_border'];
        $borderCss .=' wp_pricing_rounded_'. $this->config['globalStyles']['column_rounded'];
        $featuredCLass = '';
        if ($this->hasFeaturedColumn) {
            $featuredCLass = 'wp_pricing_has_featured';
        }
        
        return $borderCss.' '.$typeCss.' '.$skinCss.' '.$featuredCLass.' '.$plansCss;
    }

    private function getPlanHTML($plan, $planIndex)
    {
        $blockInnerHtml = '<div class="'.$this->getPlanColumnCssClass($plan, $planIndex).'">';
        foreach ($this->blockSerials as $serial) {
            $method = 'get'.ucfirst($serial).'Html';
            if (method_exists($this, $method)) {
                $blockInnerHtml .= $this->{$method}($plan);
            }
        }
        $blockInnerHtml .= '</div>';

        return $blockInnerHtml;
    }

    private function getPlanColumnCssClass($plan, $planIndex)
    {
        $class_class = 'wp_pricing_table_column wp_pricing_column_'.($planIndex + 1);
        if ($plan['is_featured'] == 'yes') {
            $this->hasFeaturedColumn = true;
            $class_class .= ' ninja_featured_column';
        }

        return $class_class;
    }

    public function getHeaderHtml($plan)
    {
        return View::make('table.header', array(
            'header' => $plan['header']
        ));
    }

    public function getRibbonHtml($plan)
    {
        return View::make('table.ribbon', array(
            'ribbon' => $plan['ribbon'],
            'plan'   => $plan
        ));
    }

    public function getFeaturesHtml($plan)
    {
        return View::make('table.features', array(
            'features' => $plan['features']
        ));
    }

    public function getPriceHtml($plan)
    {
        return View::make('table.price', array(
            'price' => $plan['price']
        ));
    }

    public function getFooterHtml($plan)
    {
        return View::make('table.footer', array(
            'footer' => $plan['footer']
        ));
    }

    public function generateCSSVars($primaryColor)
    {
        $SecondaryColor = '#17191a';
        $lightColor = 'rgb(255, 255, 255)';
        $header = $ribbon = $features = $footer = $price = array();
        $skin = $this->config['globalStyles']['skin_id'];
        if ($skin == 'skin_1') {
            $header = array(
                'bg'      => $primaryColor,
                'h2Color' => $lightColor,
                'h4Color' => $lightColor,
            );
            $ribbon = array(
                'bg'    => $lightColor,
                'color' => $primaryColor
            );
            $features = array(
                'icon'       => $primaryColor,
                'text_color' => $SecondaryColor
            );
            $price = array(
                'color' => $SecondaryColor,
            );
            $footer = array(
                'caption'       => $SecondaryColor,
                'btn_primary'   => $primaryColor,
                'btn_secondary' => $lightColor
            );
        } elseif ($skin == 'skin_2') {
            $header = array(
                'bg'      => 'inherit',
                'h2Color' => $SecondaryColor,
                'h4Color' => $SecondaryColor,
            );
            $ribbon = array(
                'bg'    => $primaryColor,
                'color' => $lightColor
            );
            $features = array(
                'icon'       => $primaryColor,
                'text_color' => $SecondaryColor
            );
            $footer = array(
                'caption'       => $SecondaryColor,
                'btn_primary'   => $primaryColor,
                'btn_secondary' => $lightColor
            );
            $price = array(
                'color' => $SecondaryColor,
            );
        } elseif ($skin == 'skin_3') {
            $header = array(
                'bg'      => $primaryColor,
                'h2Color' => $lightColor,
                'h4Color' => $lightColor,
            );
            $ribbon = array(
                'bg'    => $lightColor,
                'color' => $primaryColor
            );
            $features = array(
                'bg'         => $primaryColor,
                'icon'       => $lightColor,
                'text_color' => $lightColor
            );
            $price = array(
                'color' => $lightColor,
                'bg'    => $primaryColor
            );
            $footer = array(
                'bg'            => $primaryColor,
                'caption'       => $lightColor,
                'btn_primary'   => $primaryColor,
                'btn_secondary' => $lightColor
            );
        }

        return array(
            'header'   => $header,
            'ribbon'   => $ribbon,
            'features' => $features,
            'footer'   => $footer,
            'price'    => $price
        );
    }

    public function generateCSS($prefix, $cssVars)
    {
        $cssVars['prefix'] = $prefix;

        return View::make('table._css', $cssVars);
    }

    public function generateBlockCSS($section, $prefix)
    {
        $allSelectors = PricingTableHandler::getElementConfig();
        if ( ! isset($allSelectors[$section]['cssElements']) || ! $this->config['element_config'][$section]) {
            return '';
        }

        $selectors = $allSelectors[$section]['cssElements'];
        $selectorValues = $this->config['element_config'][$section];

        $css = '';

        foreach ($selectorValues as $selectorIndex => $selector_value) {
            if ( ! empty($selectors[$selectorIndex]['selector']) && $selector_value) {
                $suffix = '';
                if ( ! empty($selectors[$selectorIndex]['suffix'])) {
                    $suffix = $selectors[$selectorIndex]['suffix'];
                }
                $css .= $prefix.' '.$selectors[$selectorIndex]['selector'].' { '.$selectors[$selectorIndex]['attribute']
                        .':'.$selector_value.$suffix.'}';
            }
        }

        return $css;
    }

    public function getAllGeneratedCSS($primaryColor, $plans)
    {
        if ($cachedCSS = get_post_meta($this->tableId, '_wp_pricing_table_css', true)) {
            return $cachedCSS;
        }

        $primaryCssVars = $this->generateCSSVars($primaryColor);
        $PrimaryCSS = $this->generateCSS('.wp_pricing_wrapper', $primaryCssVars);
        $PrimaryCSS .= '.wp_pricing_wrapper .wp_pricing_table_column { border-color:'.$primaryColor.';}';
        $columnCSS = '';

        foreach ($plans as $planIndex => $plan) {
            if ($plan['primary_color']) {
                $columnCssVars = $this->generateCSSVars($plan['primary_color']);
                $columnCSS .= $this->generateCSS('.wp_pricing_wrapper .wp_pricing_column_'.($planIndex + 1),
                    $columnCssVars);
                $columnCSS .= '.wp_pricing_wrapper .wp_pricing_table_column.wp_pricing_column_'.($planIndex + 1)
                              .'{ border-color:'.$plan['primary_color'].';}';
            }
        }

        $blocks = array('header', 'features', 'price', 'footer');
        $blockCSS = '';
        foreach ($blocks as $block) {
            $blockCSS .= $this->generateBlockCSS($block,
                '.wp_pricing_wrapper .wp_pricing_table-inner .wp_pricing_table_column');
        }

        $allCSS = $PrimaryCSS.$columnCSS.$blockCSS;
        $compressed = str_replace('; ', ';', str_replace(' }', '}', str_replace('{ ', '{',
            str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), "",
                preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $allCSS)))));

        update_post_meta($this->tableId, '_wp_pricing_table_css', $compressed);

        return $compressed;
    }

}