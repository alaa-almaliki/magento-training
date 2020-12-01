<?php

declare(strict_types=1);

namespace Training\Phpinfo\Block\Adminhtml\Config\From\Fieldset;

use Magento\Framework\Data\Form\Element\AbstractElement;

class Phpinfo extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    /**
     * @return string
     */
    protected function getPHPInfoHtml(): string
    {
        ob_start();
        phpinfo();
        $phpinfo = ob_get_contents();
        ob_end_clean();
        $phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);
        return "
        <style type='text/css'>
            #phpinfo {}
            #phpinfo pre {margin: 0; font-family: monospace;}
            #phpinfo a:link {color: #009; text-decoration: none; background-color: #fff;}
            #phpinfo a:hover {text-decoration: underline;}
            #phpinfo table {border-collapse: collapse; border: 0; width: 934px; box-shadow: 1px 2px 3px #ccc;}
            #phpinfo .center {text-align: center;}
            #phpinfo .center table {margin: 1em auto; text-align: left;}
            #phpinfo .center th {text-align: center !important;}
            #phpinfo td, th {border: 1px solid #666; font-size: 75%; vertical-align: baseline; padding: 4px 5px;}
            #phpinfo h1 {font-size: 150%;}
            #phpinfo h2 {font-size: 125%;}
            #phpinfo .p {text-align: left;}
            #phpinfo .e {background-color: #ccf; width: 300px; font-weight: bold;}
            #phpinfo .h {background-color: #99c; font-weight: bold;}
            #phpinfo .v {background-color: #ddd; max-width: 300px; overflow-x: auto; word-wrap: break-word;}
            #phpinfo .v i {color: #999;}
            #phpinfo img {float: right; border: 0;}
            #phpinfo hr {width: 934px; background-color: #ccc; border: 0; height: 1px;}
        </style>
        <div id='phpinfo'>
            $phpinfo
        </div>
        ";
    }

    /**
     * Return header html for fieldset
     *
     * @param AbstractElement $element
     * @return string
     */
    protected function _getHeaderHtml($element)
    {
        if ($element->getIsNested()) {
            $html = '<tr class="nested"><td colspan="4"><div class="' . $this->_getFrontendClass($element) . '">';
        } else {
            $html = '<div class="' . $this->_getFrontendClass($element) . '">';
        }

        $html .= '<div class="entry-edit-head admin__collapsible-block">' .
            '<span id="' .
            $element->getHtmlId() .
            '-link" class="entry-edit-head-link"></span>';

        $html .= $this->_getHeaderTitleHtml($element);

        $html .= '</div>';
        $html .= '<input id="' .
            $element->getHtmlId() .
            '-state" name="config_state[' .
            $element->getId() .
            ']" type="hidden" value="' .
            (int)$this->_isCollapseState(
                $element
            ) . '" />';
        $html .= '<fieldset class="' . $this->_getFieldsetCss() . '" id="' . $element->getHtmlId() . '">';
        $html .= '<legend>' . $element->getLegend() . '</legend>';

        $html .= $this->_getHeaderCommentHtml($element);

        $html .= $this->getPHPInfoHtml();

        // field label column
        $html .= '<table cellspacing="0" class="form-list"><colgroup class="label" /><colgroup class="value" />';
        if ($this->getRequest()->getParam('website') || $this->getRequest()->getParam('store')) {
            $html .= '<colgroup class="use-default" />';
        }
        $html .= '<colgroup class="scope-label" /><colgroup class="" /><tbody>';

        return $html;
    }
}
