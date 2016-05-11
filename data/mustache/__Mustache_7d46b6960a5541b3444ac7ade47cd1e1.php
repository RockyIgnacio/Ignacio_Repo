<?php

class __Mustache_7d46b6960a5541b3444ac7ade47cd1e1 extends Mustache_Template
{
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $newContext = array();

        $buffer .= $indent . '<div class="result-page-divider">
';
        $buffer .= $indent . '	<div class="result-count">';
        $value = $this->resolveValue($context->find('from'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' - ';
        $value = $this->resolveValue($context->find('to'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' of ';
        $value = $this->resolveValue($context->find('total'), $context, $indent);
        $buffer .= htmlspecialchars($value, 2, 'UTF-8');
        $buffer .= ' results</div>
';
        $buffer .= $indent . '</div>';

        return $buffer;
    }
}
